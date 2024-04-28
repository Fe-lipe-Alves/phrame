<?php

namespace App\Actions\Profile;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

final class ProfilePhotos
{
    public function handle(User $user): HasMany
    {
        $query = $user->photos()
            ->withExists(['likedUsers' => function ($query) {
                $query->where('user_id', Auth::id());
            }])
            ->withCount('likedUsers')
            ->orderBy('created_at', 'desc');

        if ($user->getKey() !== Auth::id()) {
            $query->onlyPublic();
        }

        return $query;
    }
}
