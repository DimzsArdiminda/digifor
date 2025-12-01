<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\user\MainController;
use App\Http\Controllers\user\AlumniController;
use App\Http\Controllers\KasusController;
use App\Http\Controllers\TindakanForensikController;
use App\Http\Controllers\admin\MainController as AdminMainController;
use App\Http\Controllers\admin\DataKorbanController;
use App\Http\Controllers\web\AuthController;



Route::get('/welcome', function () {
    return Inertia::render('welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';


// User Page
Route::get('/', [App\Http\Controllers\user\MainController::class, 'index'])->name('main.index');
Route::get('/about', [App\Http\Controllers\user\AboutController::class, 'index'])->name('user.about');
Route::get('/contact', [App\Http\Controllers\user\ContactController::class, 'index'])->name('user.contact');
Route::prefix('alumni')->name('alumni.')->group(function () {
    Route::get('/data', [AlumniController::class, 'data'])->name('data');
    Route::get('/employment', [AlumniController::class, 'employment'])->name('employment');
});


// Admin Page
Route::get('/admin', [App\Http\Controllers\admin\MainController::class, 'index'])->name('admin.index');

// ====== CRUD DATA KORBAN (tabel: data_korban) ======
// Route::middleware('auth')->group(function () {
//     Route::resource('data-korban', DataKorbanController::class);
// });
// SEMENTARA untuk test tanpa auth
Route::resource('data-korban', DataKorbanController::class);


// ====== AUTH (LOGIN BLADE) ======
Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', function () {
        return view('layouts.auth.signin');
    })->name('login');
});
Route::resource('kasus', KasusController::class)->middleware('CheckMid');
// Route::resource('kasus', KasusController::class)->middleware('checkmid');

Route::resource('/tindakan', TindakanForensikController::class)->middleware('CheckMid');
Route::resource('/data-korban', DataKorbanController::class);

include "api.php";