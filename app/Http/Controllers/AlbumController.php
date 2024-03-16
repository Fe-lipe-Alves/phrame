<?php

namespace App\Http\Controllers;

use App\Actions\Album\AlbumCreate;
use App\Actions\Album\AlbumDelete;
use App\Actions\Album\AlbumPaginate;
use App\Actions\Album\AlbumUpdate;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Http\Resources\AlbumResource;
use App\Models\Album;
use Illuminate\Http\JsonResponse;

class AlbumController extends Controller
{
    public function index()
    {
        return AlbumPaginate::handle();
    }

    public function store(StoreAlbumRequest $request): AlbumResource
    {
        $album = AlbumCreate::handle($request->all());

        return new AlbumResource($album);
    }

    public function show(Album $album): AlbumResource
    {
        return new AlbumResource($album);
    }

    public function update(UpdateAlbumRequest $request, Album $album): JsonResponse
    {
        $success = AlbumUpdate::handle($album, $request->all());

        return response()->json([
            'success' => $success,
            'data' => new AlbumResource($album->refresh()),
        ]);
    }

    public function destroy(Album $album): JsonResponse
    {
        $success = AlbumDelete::handle($album);

        return response()->json(['success' => $success], 204);
    }
}
