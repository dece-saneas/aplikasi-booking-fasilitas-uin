<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FacilityUnitStoreRequest;
use App\Models\Facility;
use App\Models\FacilityUnit;
use File;

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
        $facilities = Facility::all();

        if (count($facilities) >= 1) return view('pages.unit-create', compact(['facilities']));

        return back()->with('info', 'Maaf, belum ada fasilitas yang tersedia.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacilityUnitStoreRequest $request)
    {
        $photo = $request->file('photo');
        $photo->move('img/facilities', $photo->getClientOriginalName());

        FacilityUnit::create(array_merge($request->validated(), ['photo' => $photo->getClientOriginalName()]));

        return back()->withSuccess('Unit berhasil ditambahkan.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FacilityUnit $unit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facility $fasilitas, FacilityUnit $unit)
    {

        if (File::exists(public_path('img/facilities/' . $unit->photo))) {

            File::delete(public_path('img/facilities/' . $unit->photo));
        }

        $unit->delete();

        return back()->withSuccess('Data berhasil di hapus.');
    }
}
