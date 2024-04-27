<?php

namespace App\Actions\Photo;

use App\Models\Photo;
use App\Models\PhotoCam;

final class PhotoCamCreate
{
    public function handle(array $data, Photo $photo): PhotoCam
    {
        $cam = new PhotoCam($data);
        $cam->photo()->associate($photo);
        $cam->save();
        return $cam;
    }
}
