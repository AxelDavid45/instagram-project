<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //Middleware for login
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function saveComment(Request $req)
    {
        //Validating data
        $validate = $this->validate($req, [
            'image_id' => 'integer|required',
            'content' => 'string|required'
        ]);

        //Keep data in variables
        $user = \Auth::user();
        $image_id = $req->input('image_id');
        $content = $req->input('content');

        if ($validate) {
            //Instance comment model
            $commentModel = new Comment();
            //Fill out data into comment model
            $commentModel->user_id = $user->id;
            $commentModel->image_id = $image_id;
            $commentModel->content = $content;
            //Save into database
            $commentModel->save();

            return redirect()->route('image.detail', ['id' => $image_id])
                ->with([
                    'message' => 'Comment saved'
                ]);
        }

        return redirect()->route('image.detail', ['id' => $image_id])
            ->with([
                'messageError' => 'Error saving comment'
            ]);
    }
}
