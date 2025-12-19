<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\EkstrakulikulerController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\SarpasController;
use App\Http\Controllers\PpdbController;

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

    Route::get('/guru', [GuruController::class, 'index'])->name('guru');
    Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create');
    Route::post('/guru', [GuruController::class, 'store'])->name('guru.store');

    Route::get('/guru/{id}/edit', [GuruController::class, 'edit'])->name('guru.edit');
    Route::put('/guru/{id}', [GuruController::class, 'update'])->name('guru.update');

    Route::delete('/guru/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');

    Route::get('/ekstrakulikuler', [EkstrakulikulerController::class, 'index'])->name('ekstrakulikuler');
    Route::get('/ekstrakulikuler/create', [EkstrakulikulerController::class, 'create'])->name('ekstrakulikuler.create');
    Route::post('/ekstrakulikuler', [EkstrakulikulerController::class, 'store'])->name('ekstrakulikuler.store');

    Route::get('/ekstrakulikuler/{id}/edit', [EkstrakulikulerController::class, 'edit'])->name('ekstrakulikuler.edit');
    Route::put('/ekstrakulikuler/{id}', [EkstrakulikulerController::class, 'update'])->name('ekstrakulikuler.update');

    Route::delete('/ekstrakulikuler/{id}', [EkstrakulikulerController::class, 'destroy'])->name('ekstrakulikuler.destroy');

    Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');

    Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');

    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');

    Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi');
    Route::get('/prestasi/create', [PrestasiController::class, 'create'])->name('prestasi.create');
    Route::post('/prestasi', [PrestasiController::class, 'store'])->name('prestasi.store');

    Route::get('/prestasi/{id}/edit', [PrestasiController::class, 'edit'])->name('prestasi.edit');
    Route::put('/prestasi/{id}', [PrestasiController::class, 'update'])->name('prestasi.update');

    Route::delete('/prestasi/{id}', [PrestasiController::class, 'destroy'])->name('prestasi.destroy');

    Route::get('/sarpas', [SarpasController::class, 'index'])->name('sarpas');
    Route::get('/sarpas/create', [SarpasController::class, 'create'])->name('sarpas.create');
    Route::post('/sarpas', [SarpasController::class, 'store'])->name('sarpas.store');

    Route::get('/sarpas/{id}/edit', [SarpasController::class, 'edit'])->name('sarpas.edit');
    Route::put('/sarpas/{id}', [SarpasController::class, 'update'])->name('sarpas.update');

    Route::delete('/sarpas/{id}', [SarpasController::class, 'destroy'])->name('sarpas.destroy');

    Route::get('/ppdb', [PpdbController::class, 'index'])->name('ppdb');
    Route::get('/ppdb/create', [PpdbController::class, 'create'])->name('ppdb.create');
    Route::post('/ppdb', [PpdbController::class, 'store'])->name('ppdb.store');

    Route::get('/ppdb/{id}/edit', [PpdbController::class, 'edit'])->name('ppdb.edit');
    Route::put('/ppdb/{id}', [PpdbController::class, 'update'])->name('ppdb.update');
    
    Route::delete('/ppdb/{id}', [PpdbController::class, 'destroy'])->name('ppdb.destroy');
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

Route::get('tentang/ekstra', [EkstrakulikulerController::class, 'frontend'])
    ->name('ekstra');

Route::get('tentang/fasilitas', [SarpasController::class, 'frontend'])
    ->name('fasilitas');

Route::get('informasi/prestasi', [PrestasiController::class, 'front'])
    ->name('prestasi.front');

Route::get('informasi/berita', [BeritaController::class, 'frontend'])
    ->name('berita.frontend');
Route::get('/berita/{id}', [BeritaController::class, 'show'])
    ->name('berita.detail');

Route::get('ppdb/ppdb', [PpdbController::class, 'frontend'])
    ->name('ppdb.frontend');