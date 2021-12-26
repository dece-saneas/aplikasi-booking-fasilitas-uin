<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FacilityStoreRequest;
use App\Http\Requests\FacilityUpdateRequest;
use App\Models\Facility;
use App\Models\FacilityUnit;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities = Facility::all();
        $units = FacilityUnit::with(['facility'])->orderBy('facility_id')->paginate(10);

        return view('pages.facility-index', compact(['facilities', 'units']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacilityStoreRequest $request)
    {
        Facility::create($request->validated());

        return redirect()->route('fasilitas.index')->withSuccess('Fasilitas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Facility $fasilitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Facility $fasilitas)
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
    public function update(FacilityUpdateRequest $request, Facility $fasilitas)
    {
        $fasilitas->update($request->validated());

        return redirect()->route('fasilitas.index')->withSuccess('Data Fasilitas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facility $fasilitas)
    {
        $fasilitas->delete();

        return back()->withSuccess('Data fasilitas berhasil di hapus.');
    }
}
