<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    // Assign table for queries
    protected $table = 'images';

    // Relation one to many
    public function comments() {
        return $this->hasMany("App\Comment");
    }

    public function likes() {
        return $this->hasMany('App\Like');
    }

    //Relation many to one
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }


}
