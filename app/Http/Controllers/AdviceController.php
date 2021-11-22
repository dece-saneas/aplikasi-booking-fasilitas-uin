<?php

namespace App\Http\Controllers;

use App\Models\Advice;
use Illuminate\Http\Request;
use App\Http\Requests\AdviceStoreRequest;
use App\Models\Facility;

class AdviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.saran-create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facilities = Facility::all();

        return view('pages.advice-create', compact('facilities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdviceStoreRequest $request)
    {
        Advice::create($request->validated());

        return back()->withSuccess('Terimakasih, saran kamu telah kami terima.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advice  $advice
     * @return \Illuminate\Http\Response
     */
    public function show(Advice $advice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advice  $advice
     * @return \Illuminate\Http\Response
     */
    public function edit(Advice $advice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advice  $advice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advice $advice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advice  $advice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advice $advice)
    {
        //
    }
}
