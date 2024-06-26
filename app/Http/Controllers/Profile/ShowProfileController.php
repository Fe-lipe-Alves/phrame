<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ShowProfileController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(User $user): View
    {
        $view = 'photos';
        return view('profile.show', compact('user', 'view'));
    }

    public function photos(User $user): View
    {
        $view = 'photos';
        return view('profile.show', compact('user', 'view'));
    }

    public function albums(User $user): View
    {
        $view = 'albums';
        return view('profile.show', compact('user', 'view'));
    }

    public function likes(User $user): View
    {
        $view = 'likes';
        return view('profile.show', compact('user', 'view'));
    }
}
