<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    //Middleware for login
    public function __construct()
    {
        $this->middleware('auth');
    }

//    Return view to create post
    public function uploadForm() {
        return view('image.create');
    }
}
