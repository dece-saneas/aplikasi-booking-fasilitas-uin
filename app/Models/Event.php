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

    /**
     * Get the unitthat used on the event.
     */
    public function document()
    {
        return $this->hasMany(Document::class);
    }

    /**
     * Get the user's first name.
     * @param  string  $value
     * @return string
     */
    public function getKtmAttribute()
    {
        return $this->document()->where('name', 'LIKE', '%ktm%')->pluck('name')->first();
    }

    /**
     * Get the user's first name.
     * @param  string  $value
     * @return string
     */
    public function getLampiranAttribute()
    {
        return $this->document()->where('name', 'LIKE', '%lampiran%')->pluck('name')->first();
    }

    /**
     * Get the user's first name.
     * @param  string  $value
     * @return string
     */
    public function getRundownAttribute()
    {
        return $this->document()->where('name', 'LIKE', '%rundown%')->pluck('name')->first();
    }
}
