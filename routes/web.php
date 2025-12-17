<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/ubah-password', [AuthController::class, 'showUbahPassword'])->name('password.form');
Route::post('/ubah-password', [AuthController::class, 'updatePassword'])->name('password.update');
Route::middleware(['admin'])->group(function () {
    Route::get('/admin', fn() => view('admin.dashboard'));
    Route::get('/akun', [AuthController::class, 'account'])->name('account');
    Route::get('/akun/create', [AuthController::class, 'create'])->name('akun.create');
    Route::post('/akun', [AuthController::class, 'store'])->name('akun.store');

    Route::get('/akun/{id}/edit', [AuthController::class, 'edit'])->name('akun.edit');
    Route::put('/akun/{id}', [AuthController::class, 'update'])->name('akun.update');
    Route::delete('/akun/{id}', [AuthController::class, 'destroy'])
    ->name('akun.destroy');
    
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');

    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');

    Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
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