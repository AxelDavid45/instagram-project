<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function saveLike($id_image) {
        //User data logged in
        $user = \Auth::user();

        //Find if exists other like from the same user
        $likeExist = Like::where('user_id', '=', $user->id)
            ->where('image_id', '=', $id_image)->count();

        if ($likeExist == 0) {
            //Instance like model
            $likeModel = new Like();

            //Fill out columns data
            $likeModel->user_id = $user->id;
            $likeModel->image_id = $id_image;

            //Save in database
            $likeModel->save();

            //Return json
            return response()->json([
                'like' => $likeModel
            ]);
        }

        //Return json
        return response()->json([
            'like' => 'Already exist'
        ]);

    }
}
