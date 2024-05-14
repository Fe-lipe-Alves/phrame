<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SendPhotoController extends Controller
{
    public function index(): View
    {
        return view('send-photo.index2');
    }

    public function storeImage(Request $request): JsonResponse
    {
        if ($files = $request->file('files')) {
            $images = [];

            foreach ($files as $file) {
                $path = $file->store('public/temp');

                $data = [
                    'name' => $file->getClientOriginalName(),
                    'path' => $path,
                    'id' => Str::slug($path),
                    'url' => url(Storage::url($path)),
                ];

                $html = \Illuminate\Support\Facades\View::make('send-photo.preview-image', ['image' => $data])->render();

                $images[] = [
                    ...$data,
                    'html' => $html,
                ];
            }

            if ($images) {
                return response()->json(['success' => true, 'content' => $images]);
            }
        }

        return response()->json(['success' => false, 'message' => 'File not found.'], 406);
    }
}
