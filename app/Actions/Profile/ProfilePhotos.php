<?php

namespace App\Actions\Profile;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

final class ProfilePhotos
{
    public function handle(User $user): Collection
    {
        $query = $user->photos()
            ->where('author_id', $user->getKey())
            ->orderBy('created_at', 'desc');

        if ($user->getKey() === Auth::id()) {
            $query->withPrivate();
        }

        return $query->get();
    }
}
