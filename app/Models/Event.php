<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = array(
        'name', 'introduction', 'content', 'date', 'time',
        'location', 'noMembers', 'dateCreate', 'createrId', 'imageSource', 'status'
    );

    public function user()
    {
        return $this->belongsTo(User::class, 'createrId');
    }
}