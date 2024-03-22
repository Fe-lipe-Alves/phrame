<?php

namespace App\Actions\Album;

use App\Models\Album;

class AlbumUpdate
{
    public static function handle(Album $album, array $data): bool
    {
        $success = $album->fill($data)->save();

        $album->refresh();

        return $success;
    }
}
