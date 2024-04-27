<?php

namespace App\Http\Controllers;

use App\Actions\Photo\PhotoCreate;
use App\Actions\Photo\PhotoPaginate;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\Http\Resources\PhotoResource;
use App\Models\Photo;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class PhotoController extends Controller
{
    public function index(): View
    {
        $photos = PhotoPaginate::handle();
        return view('photos.index', compact('photos'));
    }

    public function store(StorePhotoRequest $request, PhotoCreate $photoCreate): RedirectResponse
    {
        $photoCreate->handle($request->all());

        return response()->redirectToRoute('photo.index');
    }

    public function show(Photo $photo): PhotoResource
    {
        return new PhotoResource($photo);
    }

    public function update(UpdatePhotoRequest $request, Photo $photo): JsonResponse
    {
        $success = $photo->update($request->all());

        return response()->json([
            'success' => $success,
            'data' => $photo->refresh(),
        ]);
    }

    public function destroy(Photo $photo): JsonResponse
    {
        $success = $photo->delete();

        return response()->json([
            'success' => $success,
        ], 204);
    }
}
