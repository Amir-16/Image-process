<?php

namespace App\Services;

use Intervention\Image\Facades\Image;

class ConvertWebp
{

    public static function imageConverter($img)
    {
        $extension = 'webp';
        $uniqueId = uniqid();
        // Create image instances and paths
        $image1 = Image::make($img->getRealPath())->resize(60, 60)->save('uploads/' . $uniqueId . '_60x60.' . $extension);
        $image2 = Image::make($img->getRealPath())->resize(200, 200)->save('uploads/' . $uniqueId . '_200x200.' . $extension);

    }

}
