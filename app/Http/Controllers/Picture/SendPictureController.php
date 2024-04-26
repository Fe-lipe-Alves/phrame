<?php

namespace App\Http\Controllers\Picture;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class SendPictureController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $albums = Album::all();
        return view('picture.send-picture', compact('albums'));
    }
}
