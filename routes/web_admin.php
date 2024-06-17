<?php

use App\Http\Controllers\CriteriaComparisonController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\CriteriaSelectedController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('admin.index');

Route::prefix('data-kriteria')->name('admin.kriteria.')->group(function () {
    Route::get('/', [CriteriaController::class, 'index'])->name('index');
    Route::get('/tambah', [CriteriaController::class, 'create'])->name('create');
    Route::post('/store', [CriteriaController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [CriteriaController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [CriteriaController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [CriteriaController::class, 'destroy'])->name('destroy');
});

Route::prefix('perbandingan')->name('admin.perbandingan.')->group(function () {
    Route::get('/', [CriteriaSelectedController::class, 'index'])->name('index');
    Route::get('/tambah', [CriteriaSelectedController::class, 'create'])->name('create');
    Route::post('/store', [CriteriaSelectedController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [CriteriaSelectedController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [CriteriaSelectedController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [CriteriaSelectedController::class, 'destroy'])->name('destroy');


    Route::get('/compare/{id}', [CriteriaComparisonController::class, 'index'])->name('compare');
});
