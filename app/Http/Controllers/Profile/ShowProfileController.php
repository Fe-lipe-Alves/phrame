<?php

namespace App\Http\Controllers\Profile;

use App\Actions\Profile\ProfileLikes;
use App\Actions\Profile\ProfilePhotos;
use App\Actions\Profile\ProfileUser;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;

class ShowProfileController extends Controller
{
    public function __construct(
        private readonly ProfileUser $profileUser,
    ) {
    }

    public function index(User $user, ProfilePhotos $profilePhotos): View
    {
        $view = 'photos';
        $photos = $profilePhotos->handle($user)->get();
        $user = $this->profileUser->handle($user);

        return view('profile.show', compact('user', 'view', 'photos'));
    }

    public function albums(User $user): View
    {
        $view = 'albums';
        $user = $this->profileUser->handle($user);

        return view('profile.show', compact('user', 'view'));
    }

    public function likes(User $user, ProfileLikes $profileLikes): View
    {
        $view = 'likes';
        $photos = $profileLikes->handle($user)->get();
        $user = $this->profileUser->handle($user);

        return view('profile.show', compact('user', 'view', 'photos'));
    }
}
