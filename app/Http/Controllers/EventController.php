<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Requests\EventStoreRequest;
use App\Models\Facility;
use App\Models\FacilityUnit;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class EventController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->middleware(['auth'], ['except' => ['index']]);
        $this->middleware(['role:Mahasiswa'], ['only' => ['create', 'store']]);
        $this->middleware(['role:Mahasiswa|Pengurus'], ['only' => ['show', 'list']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (request()->ajax()) {

            if (FacilityUnit::count() == 0) return response()->json(NULL);

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
        if (Facility::count() == 0) return back()->with('info', 'Maaf, belum ada fasilitas yang tersedia.');

        $facilities = Facility::all();
        return view('pages.event-create', compact('facilities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventStoreRequest $request)
    {
        $period = explode(" s/d ", $request->period);

        $event = Event::create([
            'code' => 'UIN' . time(),
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id(),
            'facility_unit_id' => $request->facility_unit_id,
            'start' => $period[0],
            'end' => $period[1],
            'type' => $request->type,
            'status' => "Waiting",
        ]);

        $ktmFile = $request->file('ktm');
        $ktmFileName = 'ktm' . Str::random(64) . '.' . $ktmFile->getClientOriginalExtension();
        $ktmFile->move(public_path('files'), $ktmFileName);
        Document::create(['name' => $ktmFileName, 'event_id' => $event->id]);

        $lampiranFile = $request->file('lampiran');
        $lampiranFileName = 'lampiran' . Str::random(64) . '.' . $lampiranFile->getClientOriginalExtension();
        $lampiranFile->move(public_path('files'), $lampiranFileName);
        Document::create(['name' => $lampiranFileName, 'event_id' => $event->id]);

        $rundownFile = $request->file('rundown');
        $rundownFileName = 'rundown' . Str::random(64) . '.' . $rundownFile->getClientOriginalExtension();
        $rundownFile->move(public_path('files'), $rundownFileName);
        Document::create(['name' => $rundownFileName, 'event_id' => $event->id]);

        return redirect()->route('jadwal-peminjaman.list')->withSuccess('pengajuan berhasil, status pengajuan mu dapat dilihat pada tabel.');
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $status = "";
        switch ($request->type) {
            case "1":
                $status = "Approved";
                break;
            default:
                $status = "Rejected";
        };

        $event->update(['status' => $status]);

        return back()->withSuccess('Status berhasil di perbarui.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $events = Event::where('status', 'Waiting')->paginate(10);
        $histories = Event::where('status', '!=', 'Waiting')->paginate(10);

        if (Auth::user()->hasRole('Mahasiswa')) {
            $events = Event::where('user_id', Auth::id())->where('status', 'Waiting')->paginate(10);
            $histories = Event::where('user_id', Auth::id())->where('status', '!=', 'Waiting')->paginate(10);
        };

        return view('pages.event-list', compact('events', 'histories'));
    }
}
