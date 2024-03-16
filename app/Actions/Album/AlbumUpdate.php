<?php

namespace App\Actions\Album;

use App\Models\Album;

class AlbumUpdate
{
    public static function handle(Album $album, array $data): bool
    {
        return $album->fill($data)->save();
    }
}
