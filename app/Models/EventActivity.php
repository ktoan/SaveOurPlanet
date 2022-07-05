<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventActivity extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = array(
        'userId', 'eventId', 'status', 'time', 'date'
    );

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function event() {
        return $this->belongsTo(Event::class, 'eventId');
    }
}