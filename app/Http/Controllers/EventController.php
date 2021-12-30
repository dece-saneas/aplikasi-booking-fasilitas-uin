<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Facility;
use App\Models\FacilityUnit;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {

            $eventsJson = [];

            $unit = FacilityUnit::latest('created_at')->first();
            $events = Event::where('facility_unit_id', $unit->id)->get();

            if ($request->has('fasilitas')) {
                $events = Event::where('facility_unit_id', $request->fasilitas)->get();
            }

            foreach ($events as $event) {

                $bgColor = "";
                switch ($event->status) {
                    case "Approved":
                        $bgColor = "#28a745";
                        break;
                    case "Rejected":
                        $bgColor = "#dc3545";
                        break;
                    default:
                        $bgColor = "#ffc107";
                };

                $eventsJson[] = [
                    'title' => $event->title,
                    'start' => $event->start->format('Y-m-d H:i:s'),
                    'end' => $event->end->format('Y-m-d H:i:s'),
                    'backgroundColor' => $bgColor,
                    'borderColor' => $bgColor,
                    'url' => route('jadwal-peminjaman.show', $event->id)
                ];
            }

            return response()->json($eventsJson);
        };

        $facilities = Facility::all();
        $unit = FacilityUnit::latest('created_at')->first();

        return view('pages.event-index', compact('facilities', 'unit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.event-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('pages.event-create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('pages.event-show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return view('pages.event-list');
    }
}
