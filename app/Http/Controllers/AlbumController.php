<?php

namespace App\Http\Controllers;

use App\Actions\Album\AlbumCreate;
use App\Actions\Album\AlbumPaginate;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Http\Resources\AlbumResource;
use App\Models\Album;

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

    public function show(Album $album)
    {
        //
    }

    public function update(UpdateAlbumRequest $request, Album $album)
    {
        //
    }

    public function destroy(Album $album)
    {
        //
    }
}
