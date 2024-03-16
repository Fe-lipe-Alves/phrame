<?php

namespace App\Actions\Album;

use App\Models\Album;

class AlbumDelete
{
    public static function handle(Album $album): bool
    {
        return $album->delete();
    }
}
