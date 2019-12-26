<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Only user logged in
    public function __construct() {
        $this->middleware('auth');
    }

    //View for configurations
    public function configuration() {
        return view('user.config');
    }
}
