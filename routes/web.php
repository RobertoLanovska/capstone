<?php

use Illuminate\Support\Facades\Route;

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