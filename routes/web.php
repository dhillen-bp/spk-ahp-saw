<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.index');
});

Route::prefix('profil')->group(function () {
    Route::get('/', function () {
        return view('pages.profil');
    });
    Route::get('/visi-misi', function () {
        return view('pages.visi-misi');
    });
    Route::get('/struktur-organisasi', function () {
        return view('pages.struktur-organisasi');
    });
});

Route::prefix('layanan-administrasi')->group(function () {
    Route::get('/', function () {
        return view('pages.layanan-administrasi');
    });
});

Route::prefix('berita')->group(function () {
    Route::get('/', function () {
        return view('pages.berita');
    });
});

Route::get('/pengaduan', function () {
    return view('pages.pengaduan');
});

Route::get('/pengumuman', function () {
    return view('pages.pengumuman');
});
