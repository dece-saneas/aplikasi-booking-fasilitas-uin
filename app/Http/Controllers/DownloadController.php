<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use PDF;

class DownloadController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Event $event)
    {
        $pdf = PDF::setOptions(['isRemoteEnabled' => true, 'dpi' => 300, 'defaultFont' => 'sans-serif']);
        $pdf->loadview('pdf.download', compact(['event']))->setPaper('a4', 'potrait');

        return $pdf->stream($event->code . '-' . $event->title . '.pdf');
    }
}
