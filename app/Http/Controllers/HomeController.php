<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;
use App\Models\FacilityUnit;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function facilityIndex()
    {
        return view('pages.facility-index', ['facilities' => Facility::all(), 'units' => FacilityUnit::orderBy('facility_id')->get()]);
    }
    public function regulationIndex()
    {
        return view('pages.regulation-index');
    }
}
