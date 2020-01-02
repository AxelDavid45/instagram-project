<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    //Middleware for login
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function saveComment(Request $req) {
        //Validating data
        $validate = $this->validate($req, [
            'image_id' => 'integer|required',
            'content' => 'string|required'
        ]);

        $image_id = $req->input('image_id');
        $content = $req->input('content');

    }
}
