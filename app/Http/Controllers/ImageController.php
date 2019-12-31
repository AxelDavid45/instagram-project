<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    //Middleware for login
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Return view to create post
    public function uploadForm() {
        return view('image.create');
    }

    //Save the image in a storage
    public function saveImage(Request $req) {
        // Validating form data
        $validate = $this->validate($req, [
            'description' => 'required|max:255',
            'image-path'=> 'required|image'
        ]);

        // Saving data into variables
        $description = $req->input('description');
        $image = $req->file('image-path');

        if ($image) {
            //Image name
            $imageName = time().$image->getClientOriginalName();

            //Saving image in storage
            $image->storeAs('users', $imageName);

            //Filling out ImageModel data
            $imageModel = new Image();
            $imageModel->user_id = \Auth::user()->id;
            $imageModel->image_path = $imageName;
            $imageModel->description = $description;

            $imageModel->save();

            return redirect()->route('home')
                ->with([
                   'message' => 'Image uploaded successfully'
                ]);
        }

        return redirect()->route('home')
            ->with([
                'messageError' => 'There was an error while uploading your image, try it again'
            ]);
    }

    public function detail($id) {
        $image = Image::find($id);

        return view('image.detail', [
            'image' => $image
        ]);
    }
}
