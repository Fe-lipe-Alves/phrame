<?php

use App\Http\Controllers\LikePhotoController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\Picture\SendPictureController;
use App\Http\Controllers\Profile\ShowProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/password-reset', 'auth.reset-password')
    ->middleware('guest')
    ->name('password.reset');

Route::middleware(['auth'])->group(function () {
    Route::get('/send-picture', SendPictureController::class)->name('picture.send');

    Route::apiResource('/photo', PhotoController::class)->names('photo');
});

Route::prefix('profile/@{user:username}')->group(function () {
    Route::get('', [ShowProfileController::class, 'index'])->name('profile.show');
    Route::get('/photos', [ShowProfileController::class, 'photos'])->name('profile.photos');
    Route::get('/albums', [ShowProfileController::class, 'albums'])->name('profile.albums');
    Route::get('/likes', [ShowProfileController::class, 'likes'])->name('profile.likes');
});

Route::post('/photo/{photo}/like', [LikePhotoController::class, 'like'])
    ->name('photo.like');
Route::post('/photo/{photo}/dislike', [LikePhotoController::class, 'dislike'])
    ->name('photo.dislike');
