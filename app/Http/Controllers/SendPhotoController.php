<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SendPhotoController extends Controller
{
    public function index(): View
    {
        return view('send-photo.index');
    }

    public function storeImage(Request $request): JsonResponse
    {
        if ($file = $request->file('file')) {
            $path = $file->store('public/temp');
            if ($path) {
                return response()->json(['success' => true, 'path' => url(Storage::url($path))]);
            }
        }

        return response()->json(['success' => false, 'message' => 'File not found.'], 406);
    }
}
