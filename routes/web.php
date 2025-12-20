<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
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
    
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin');
    Route::get('/akun', [AuthController::class, 'account'])->name('account');
    Route::get('/akun/create', [AuthController::class, 'create'])->name('akun.create');
    Route::post('/akun', [AuthController::class, 'store'])->name('akun.store');

    Route::get('/akun/{id}/edit', [AuthController::class, 'edit'])->name('akun.edit');
    Route::put('/akun/{id}', [AuthController::class, 'update'])->name('akun.update');
    Route::delete('/akun/{id}', [AuthController::class, 'destroy'])
    ->name('akun.destroy');
    
    Route::get('/siswa/kelas-1', [SiswaController::class, 'siswa_1'])->name('siswa_1');
    Route::get('/siswa/kelas-1/create', [SiswaController::class, 'create_1'])->name('siswa_1.create');
    Route::post('/siswa/kelas-1', [SiswaController::class, 'store_1'])->name('siswa_1.store');

    Route::get('/siswa/kelas-1/{id}/edit', [SiswaController::class, 'edit_1'])->name('siswa_1.edit');
    Route::put('/siswa/kelas-1/{id}', [SiswaController::class, 'update_1'])->name('siswa_1.update');

    Route::delete('/siswa/kelas-1/{id}', [SiswaController::class, 'destroy_1'])->name('siswa_1.destroy');

    Route::get('/siswa/kelas-2', [SiswaController::class, 'siswa_2'])->name('siswa_2');
    Route::get('/siswa/kelas-2/create', [SiswaController::class, 'create_2'])->name('siswa_2.create');
    Route::post('/siswa/kelas-2', [SiswaController::class, 'store_2'])->name('siswa_2.store');

    Route::get('/siswa/kelas-2/{id}/edit', [SiswaController::class, 'edit_2'])->name('siswa_2.edit');
    Route::put('/siswa/kelas-2/{id}', [SiswaController::class, 'update_2'])->name('siswa_2.update');

    Route::delete('/siswa/kelas-2/{id}', [SiswaController::class, 'destroy_2'])->name('siswa_2.destroy');

    Route::get('/siswa/kelas-3', [SiswaController::class, 'siswa_3'])->name('siswa_3');
    Route::get('/siswa/kelas-3/create', [SiswaController::class, 'create_3'])->name('siswa_3.create');
    Route::post('/siswa/kelas-3', [SiswaController::class, 'store_3'])->name('siswa_3.store');

    Route::get('/siswa/kelas-3/{id}/edit', [SiswaController::class, 'edit_3'])->name('siswa_3.edit');
    Route::put('/siswa/kelas-3/{id}', [SiswaController::class, 'update_3'])->name('siswa_3.update');

    Route::delete('/siswa/kelas-3/{id}', [SiswaController::class, 'destroy_3'])->name('siswa_3.destroy');

    Route::get('/siswa/kelas-4', [SiswaController::class, 'siswa_4'])->name('siswa_4');
    Route::get('/siswa/kelas-4/create', [SiswaController::class, 'create_4'])->name('siswa_4.create');
    Route::post('/siswa/kelas-4', [SiswaController::class, 'store_4'])->name('siswa_4.store');

    Route::get('/siswa/kelas-4/{id}/edit', [SiswaController::class, 'edit_4'])->name('siswa_4.edit');
    Route::put('/siswa/kelas-4/{id}', [SiswaController::class, 'update_4'])->name('siswa_4.update');

    Route::delete('/siswa/kelas-4/{id}', [SiswaController::class, 'destroy_4'])->name('siswa_4.destroy');

    Route::get('/siswa/kelas-5', [SiswaController::class, 'siswa_5'])->name('siswa_5');
    Route::get('/siswa/kelas-5/create', [SiswaController::class, 'create_5'])->name('siswa_5.create');
    Route::post('/siswa/kelas-5', [SiswaController::class, 'store_5'])->name('siswa_5.store');

    Route::get('/siswa/kelas-5/{id}/edit', [SiswaController::class, 'edit_5'])->name('siswa_5.edit');
    Route::put('/siswa/kelas-5/{id}', [SiswaController::class, 'update_5'])->name('siswa_5.update');

    Route::delete('/siswa/kelas-5/{id}', [SiswaController::class, 'destroy_5'])->name('siswa_5.destroy');

    Route::get('/siswa/kelas-6', [SiswaController::class, 'siswa_6'])->name('siswa_6');
    Route::get('/siswa/kelas-6/create', [SiswaController::class, 'create_6'])->name('siswa_6.create');
    Route::post('/siswa/kelas-6', [SiswaController::class, 'store_6'])->name('siswa_6.store');

    Route::get('/siswa/kelas-6/{id}/edit', [SiswaController::class, 'edit_6'])->name('siswa_6.edit');
    Route::put('/siswa/kelas-6/{id}', [SiswaController::class, 'update_6'])->name('siswa_6.update');

    Route::delete('/siswa/kelas-6/{id}', [SiswaController::class, 'destroy_6'])->name('siswa_6.destroy');

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