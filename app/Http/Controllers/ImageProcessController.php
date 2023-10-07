<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Services\ConvertWebp;
use Exception;

class ImageProcessController extends Controller
{

    public function processImage(ImageRequest $request)
    {

        try {
            $img = $request->file('file');
            //called service class statically
            ConvertWebp::imageConverter($img);

            return response()->json([
                'status' => 1,
                'success' => 'Image Processed successfully.']
                , 200);

        } catch (Exception $e) {

            return response()->json([
                'status' => 0,
                'message' => $e->getMessage(),
            ]);
        }

    }

}
