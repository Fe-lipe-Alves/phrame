<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $user = Auth::user();

        return response()->json($user);
    }
}
