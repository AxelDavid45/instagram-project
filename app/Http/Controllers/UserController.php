<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        //Update data's user
        $user->update();

        //Redirection
        return redirect()->route('config')
            ->with(['message' => 'Information has updated successfully']);

    }
}