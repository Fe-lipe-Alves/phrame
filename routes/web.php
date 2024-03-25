<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/password-reset')
    ->middleware('guest')
    ->name('password.reset');
