<?php

namespace App\Actions\Profile;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

final class ProfileLikes
{
    public function handle(User $user): Builder
    {
        $query = Photo::query()
            ->whereHas('likedUsers', function (Builder $query) use ($user) {
                $query->where('user_id', $user->getKey());
            })
            ->withExists(['likedUsers' => function ($query) {
                $query->where('user_id', Auth::id());
            }])
            ->withCount('likedUsers')
            ->with('author')
            ->orderBy('created_at', 'desc');

        if ($user->getKey() !== Auth::id()) {
            $query->onlyPublic();
        }

        return $query;
    }
}
