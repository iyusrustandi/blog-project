<?php

// app/Http/Controllers/Backend/ImageUploadController.php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:51200',
        ]);

        $imagePath = $request->file('file')->store('public/posts/images');
        $imageUrl = Storage::url($imagePath);

        return response()->json(['location' => $imageUrl]);
    }
}
