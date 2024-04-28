<?php

namespace App\Actions\Profile;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

final class ProfilePhotos
{
    public function handle(User $user): Builder
    {
        $query = Photo::query()
            ->withExists(['likedUsers' => function ($query) {
                $query->where('user_id', Auth::id());
            }])
            ->withCount('likedUsers')
            ->where('author_id', $user->getKey())
            ->orderBy('created_at', 'desc');

        if ($user->getKey() !== Auth::id()) {
            $query->onlyPublic();
        }

        return $query;
    }
}
