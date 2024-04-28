<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class LikePhotoController extends Controller
{
    public function like(Photo $photo)
    {
        $action = $photo->likedUsers()->toggle(auth()->id());
        return response()->json(['action' => $action]);
    }
}
