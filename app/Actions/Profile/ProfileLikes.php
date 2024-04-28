<?php

namespace App\Actions\Profile;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;

final class ProfileLikes
{
    public function handle(User $user): BelongsToMany
    {
        $query = $user->likedPhotos()
            ->withExists(['likedUsers' => function ($query) {
                $query->where('user_id', Auth::id());
            }])
            ->withCount('likedUsers')
            ->with('author');

        if ($user->getKey() !== Auth::id()) {
            $query->onlyPublic();
        }

        return $query;
    }
}
