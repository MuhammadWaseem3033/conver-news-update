<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    /** @use HasFactory<\Database\Factories\CommentsFactory> */
    use HasFactory;

     // Define relationship with article
     public function news() {
        return $this->belongsTo(News::class);
    }

    // Define relationship with user
    public function user() {
        return $this->belongsTo(User::class);
    }
}
