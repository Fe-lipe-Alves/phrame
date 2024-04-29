<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SendPhotoController extends Controller
{
    public function index(): View
    {
        return view('send-photo.index');
    }

    public function store(Request $request): JsonResponse
    {
        if ($file = $request->file('file')) {
            $path = $file->store('photos', 'public');
            return response()->json(['success' => true, 'path' => $path]);
        }

        return response()->json(['success' => false, 'message' => 'File not found.'], 406);
    }
}
