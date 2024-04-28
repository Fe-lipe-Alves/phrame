<?php

namespace App\Actions\Profile;

use App\Models\User;

final readonly class ProfileUser
{
    public function __construct(
        private ProfilePhotos $profilePhotos,
        private ProfileLikes $profileLikes
    ) {
    }

    public function handle(User $user): User
    {
        $user->liked_photos_count = $this->profileLikes->handle($user)->count();
        $user->photos_count = $this->profilePhotos->handle($user)->count();

        return $user;
    }
}
