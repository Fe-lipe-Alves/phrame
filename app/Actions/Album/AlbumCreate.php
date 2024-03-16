<?php

namespace App\Actions\Album;

use App\Models\Album;
use Illuminate\Support\Facades\Auth;

class AlbumCreate
{
    /**
     * Cria um registro de Album e o retorna
     */
    public static function handle(array $data): Album
    {
        $album = new Album($data);

        $album->author_id = Auth::id();

        $album->save();
        $album->refresh();

        return $album;
    }
}
