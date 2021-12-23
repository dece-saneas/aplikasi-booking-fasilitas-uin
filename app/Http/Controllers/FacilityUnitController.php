<?php

namespace App\Http\Controllers;

use App\Http\Requests\FacilityUnitStoreRequest;
use App\Http\Requests\FacilityUnitUpdateRequest;
use App\Models\Facility;
use App\Models\FacilityUnit;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class FacilityUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Facility::count() == 0) return back()->with('info', 'Maaf, belum ada fasilitas yang tersedia.');

        return view('pages.unit-create', ['facilities' => Facility::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacilityUnitStoreRequest $request)
    {
        $image = $request->file('photo');
        $input['file'] = Str::random(64) . '.' . $image->getClientOriginalExtension();

        $imgFile = Image::make($image->getRealPath());
        $imgFile->resize(1024, 768)->save(public_path('/img/facilities/' . $input['file']));

        FacilityUnit::create(array_merge($request->validated(), ['photo' => $input['file']]));

        return redirect()->route('fasilitas.index')->withSuccess('Unit berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(FacilityUnit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FacilityUnit $unit)
    {
        return view('pages.unit-edit', ['unit' => $unit, 'facilities' => Facility::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FacilityUnitUpdateRequest $request, FacilityUnit $unit)
    {
        if ($request->hasFile('photo')) {

            $image = $request->file('photo');

            $imgFile = Image::make($image->getRealPath());

            $imgFile->resize(1024, 768)->save(public_path('/img/facilities/' . $unit->photo));
        }

        $unit->update(array_merge($request->validated(), ['photo' => $unit->photo]));

        return redirect()->route('fasilitas.index')->withSuccess('Data Unit berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FacilityUnit $unit)
    {

        if (File::exists(public_path('img/facilities/' . $unit->photo))) {

            File::delete(public_path('img/facilities/' . $unit->photo));
        }

        $unit->delete();

        return back()->withSuccess('Unit berhasil di hapus.');
    }
}
