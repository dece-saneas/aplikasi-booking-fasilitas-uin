<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdviceStoreRequest;
use App\Models\Advice;
use App\Models\Facility;

class AdviceController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.advice-create', ['facilities' => Facility::all()]);
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
}
