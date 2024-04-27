<?php

namespace App\Actions\Photo;

use App\Models\Photo;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class PhotoPaginate
{
    public static function handle(): LengthAwarePaginator
    {
        return Photo::query()->paginate();
    }
}
