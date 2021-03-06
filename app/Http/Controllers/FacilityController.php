<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FacilityStoreRequest;
use App\Http\Requests\FacilityUpdateRequest;
use App\Models\Facility;
use App\Models\FacilityUnit;
use Illuminate\Support\Facades\Auth;

class FacilityController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role:Admin'], ['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities = Facility::all();
        $units = FacilityUnit::with(['facility'])->orderBy('facility_id')->paginate(10);

        if (Auth::guest() || Auth::user()->hasAnyRole(['Mahasiswa', 'Pengurus'])) {
            if (Facility::count() == 0) return redirect('/')->with('info', 'Maaf, belum ada fasilitas yang tersedia.');
        }
        return view('pages.facility-index', compact(['facilities', 'units']));
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
