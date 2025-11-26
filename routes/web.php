<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/tentang/profile', function () {
    return view('profile'); // misal kamu punya file profile.blade.php
})->name('tentang.profile');

Route::get('/tentang/guru', function () {
    return view('guru'); // misal kamu punya file profile.blade.php
})->name('tentang.guru');

Route::get('/tentang/ekstra', function () {
    return view('ekstra'); // misal kamu punya file profile.blade.php
})->name('tentang.ekstra');