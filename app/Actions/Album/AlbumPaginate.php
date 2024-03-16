<?php

namespace App\Actions\Album;

use App\Models\Album;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class AlbumPaginate
{
    public static function handle($search = ''): LengthAwarePaginator
    {
        return Album::query()
            ->when($search, fn (Builder $query) => $query->where('title', 'like', "%$search%"))
            ->paginate();
    }
}
