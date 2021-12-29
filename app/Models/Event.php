<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'start',
        'end'
    ];
    /**
     * Get user that own the event.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the unitthat used on the event.
     */
    public function unit()
    {
        return $this->belongsTo(FacilityUnit::class, 'facility_unit_id');
    }
}
