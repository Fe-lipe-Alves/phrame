<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Auth;

abstract class TestCase extends BaseTestCase
{
    public function withAuth(): User
    {
        /** @var User $user */
        $user = User::factory()->create();

        Auth::login($user);

        return $user;
    }
}
