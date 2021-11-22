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
     * Get user that own the event.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the facility that used on the event.
     */
    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }
}
