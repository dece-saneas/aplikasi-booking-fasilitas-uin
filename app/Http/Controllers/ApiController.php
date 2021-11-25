<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;
use App\Models\FacilityUnit;

class ApiController extends Controller
{
    /**
     * Get the units by given facility ID.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchUnit(Request $request)
    {
        $data['units'] = FacilityUnit::where("facility_id", $request->facility_id)->get(["name", "id"]);

        return response()->json($data);
    }

    /**
     * Get the unit details by given ID.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchDataUnit(Request $request)
    {
        $data['unit'] = FacilityUnit::findOrFail($request->unit_id);

        return response()->json($data);
    }
}
