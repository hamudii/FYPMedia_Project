<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::resource('article', App\Http\Controllers\ArticleController::class);
});

Route::middleware(['auth', 'user'])->group(function () {
    Route::resource('article', App\Http\Controllers\ArticleController::class);
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\UserController;
// use App\Http\Controllers\ArticleController;

// // Route untuk halaman utama
// Route::get('/', function () {
//     return redirect('/login');
// });

// // Route untuk autentikasi (login, register, dll)
// Auth::routes();

// // Route untuk halaman dashboard setelah login
// Route::get('/home', [HomeController::class, 'index'])->name('home');

// // Route grup yang dilindungi oleh middleware 'auth' dan 'admin'
// Route::middleware(['auth'])->group(function () {
//     Route::resource('user', UserController::class);
//     Route::resource('article', ArticleController::class);
// });


