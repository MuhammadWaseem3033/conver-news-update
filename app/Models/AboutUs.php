<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $table = 'about_us';
    protected $fillable = [
        'content'
    ];
}
