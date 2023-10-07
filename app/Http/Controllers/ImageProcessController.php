<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Services\ConvertWebp;
use App\Traits\ResponseTrait;
use Exception;

class ImageProcessController extends Controller
{

    use ResponseTrait;
    public function processImage(ImageRequest $request)
    {
        try {
            $img = $request->file('file');
            // service class for img convert
            ConvertWebp::imageConverter($img);

            return $this->successMsg(1, 'Image Coneverted successfully');

        } catch (Exception $e) {

            return $this->errorMsg(0, $e->getMessage());

        }

    }

}
