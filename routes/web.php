<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/ubah-password', [AuthController::class, 'showUbahPassword'])->name('password.form');
Route::post('/ubah-password', [AuthController::class, 'updatePassword'])->name('password.update');
Route::middleware(['admin'])->group(function () {
    Route::get('/admin', fn() => view('admin.dashboard'));
});

Route::get('/', function () {
    return view('home');
});
Route::get('/tentang/profile', function () {
    return view('profile'); // misal kamu punya file profile.blade.php
})->name('tentang.profile');

Route::get('/tentang/guru', function () {
    return view('guru'); 
})->name('tentang.guru');

Route::get('/tentang/ekstra', function () {
    return view('ekstra'); 
})->name('tentang.ekstra');

Route::get('/tentang/fasilitas', function () {
    return view('sarpras'); 
})->name('tentang.fasilitas');

Route::get('/informasi/prestasi', function () {
    return view('prestasi'); 
})->name('informasi.prestasi');

Route::get('/informasi/berita', function () {
    return view('berita'); 
})->name('informasi.berita');

Route::get('/ppdb/ppdb', function () {
    return view('ppdb'); 
})->name('ppdb.ppdb');