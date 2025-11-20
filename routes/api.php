<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\AuthController;

route::get('/auth-google-redirect', [AuthController::class, 'googleRedirect'])->name('auth.google-redirect');
route::get('/auth-google-callback', [AuthController::class, 'googleCallback'])->name('auth.google-callback');


route::prefix('/auth')->name('auth.')->group(function () {
    route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});