<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.pages.dashboard');
});

Route::get('/data-kriteria', function () {
    return view('admin.pages.kriteria.index');
});
