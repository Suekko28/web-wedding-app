<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function store(Request $request)
    {
        // Validate the uploaded image
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Set limitations for image size and format
        ]);

        // Store the uploaded image
        $image = $request->file('upload');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $path = $image->storeAs('public/blog-img-child', $imageName);

        // Return the URL in JSON format for CKEditor
        return response()->json([
            'url' => Storage::url($path), // Return the public URL of the uploaded image
        ]);
    }
}
