<?php

namespace App\Actions\Album;

use App\Models\Album;

class AlbumCreate
{
    /**
     * Cria um registro de Album e o retorna
     */
    public static function handle(array $data): Album
    {
        $album = new Album($data);

        $album->save();
        $album->refresh();

        return $album;
    }
}
