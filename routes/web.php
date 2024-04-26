<?php

use App\Http\Controllers\Picture\SendPictureController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/password-reset', 'auth.reset-password')
    ->middleware('guest')
    ->name('password.reset');

Route::get('/send-picture', SendPictureController::class)->name('picture.send');
