<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PhotoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('auth', AuthController::class)->name('auth.get');

    Route::apiResource('/album', AlbumController::class)->names('album');

//    Route::apiResource('/photo', PhotoController::class)->names('photo');

    Route::post('test', function (Request $request) {
        return response()->json($request->all());
    });
});
