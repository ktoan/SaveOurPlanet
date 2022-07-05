<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = array(
        'title', 'introduction', 'content',
        'imageSource', 'dateUpload', 'createrId',
        'viewCount', 'status'
    );

    public function user()
    {
        return $this->belongsTo(User::class, 'createrId');
    }
}