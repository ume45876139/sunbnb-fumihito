<?php

namespace App\Http\Controllers;

use App\Image;
use App\Listing;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('images.upload', compact('images'));
    }

    public function upload(Request $request)
    {
        foreach ($request->file('photo') as $photo) {
            // Save to Folder
            $filename = $photo->getClientOriginalName();
            $path = $photo->storeAs("public/photos", $filename);
            $publicPath = Storage::url($path);

            Image::create([
                 //add listing_id
                'listing_id' => $request->listing_id,
                'file_location' => $publicPath,
            ]);
        }

        return response()->json(['success']);
    }
}
