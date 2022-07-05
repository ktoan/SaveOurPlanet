<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = array('userID', 'descActivity', 'time', 'date');

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }
}