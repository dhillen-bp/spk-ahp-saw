<?php

use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('admin.index');

Route::prefix('data-kriteria')->name('admin.kriteria.')->group(function () {
    Route::get('/', [CriteriaController::class, 'index'])->name('index');
    Route::get('/tambah', [CriteriaController::class, 'create'])->name('create');
});
