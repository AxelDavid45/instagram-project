<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class UserController extends Controller
{
    // Only user logged in
    public function __construct()
    {
        $this->middleware('auth');
    }

    //View for configurations
    public function configuration()
    {
        return view('user.config');
    }

    public function edit(Request $req)
    {
        // Save user object
        $user = \Auth::user();
        $id = \Auth::user()->id;

        // Validate data from form
        $validate = $this->validate($req, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'nick' => 'required|string|max:255|unique:users,nick,'.$id,
            'email' => 'required|string|max:255|unique:users,email,'.$id
        ]);



        // Save values from request
        $name = $req->input('name');
        $surname = $req->input('surname');
        $nick = $req->input('nick');
        $email = $req->input('email');

        // Assign data to user
        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;

        //Get the profile picture
        $image = $req->file('image');

        if ($image) {
            // Unique name
            $image_name = time().$image->getClientOriginalName();
            // Save it into the storage
            Storage::disk('users')->put($image_name, File::get($image->path()));
            //Save it into the database
            $user->image = $image_name;
        }

        //Update data's user
        $user->update();

        //Redirection
        return redirect()->route('config')
            ->with(['message' => 'Information has updated successfully']);

    }

    public function getImageProfile($filename_db) {
        // Get the file from storage
        $file = Storage::disk('users')->get($filename_db);
        //Return a response 200 with raw file
        return new Response($file, 200);
    }
}
