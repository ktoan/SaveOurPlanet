<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = array(
        'createrId',
        'dateUpload',
        'imageSource',
        'status'
    );

    public function user() {
        return $this->belongsTo(User::class, 'createrId');
    }
}