<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\ImageUpload;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Intervention\Image\Size;

class ImageProcessController extends Controller
{

    public function processImage(ImageRequest $request){

        try {
            $img = $request->file('file');
            $extension = 'webp';
            $uniqueId = uniqid();

            // Create image instances and paths
            $image1 = Image::make($img->getRealPath())->resize(60, 60)->save('uploads/' . $uniqueId . '_60x60.' . $extension);
            $image2 = Image::make($img->getRealPath())->resize(200, 200)->save('uploads/' . $uniqueId . '_200x200.' . $extension);
            
            return response()->json(['success' => 'Image Processed successfully.'],200);

        } catch (Exception $e) {

            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ]);
        }

    }

}
