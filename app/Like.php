<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    // Assign table for queries
    protected $table = 'likes';

    //Relations many to one
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function image() {
        return $this->belongsTo('App\Image', 'image_id');
    }
}
