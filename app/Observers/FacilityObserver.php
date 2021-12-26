<?php

namespace App\Observers;

use App\Models\Facility;
use Illuminate\Support\Facades\File;

class FacilityObserver
{
    /**
     * Handle the Facility "created" event.
     *
     * @param  \App\Models\Facility  $facility
     * @return void
     */
    public function created(Facility $facility)
    {
        //
    }

    /**
     * Handle the Facility "updated" event.
     *
     * @param  \App\Models\Facility  $facility
     * @return void
     */
    public function updated(Facility $facility)
    {
        //
    }

    /**
     * Handle the Facility "deleting" event.
     *
     * @param  \App\Models\Facility  $facility
     * @return void
     */
    public function deleting(Facility $facility)
    {
        foreach ($facility->units as $unit) {

            if (File::exists(public_path('img/facilities/' . $unit->photo))) {

                File::delete(public_path('img/facilities/' . $unit->photo));
            }
        }
    }

    /**
     * Handle the Facility "deleted" event.
     *
     * @param  \App\Models\Facility  $facility
     * @return void
     */
    public function deleted(Facility $facility)
    {
        //
    }

    /**
     * Handle the Facility "restored" event.
     *
     * @param  \App\Models\Facility  $facility
     * @return void
     */
    public function restored(Facility $facility)
    {
        //
    }

    /**
     * Handle the Facility "force deleted" event.
     *
     * @param  \App\Models\Facility  $facility
     * @return void
     */
    public function forceDeleted(Facility $facility)
    {
        //
    }
}
