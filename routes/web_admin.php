<?php

use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\AlternativeValueController;
use App\Http\Controllers\CriteriaComparisonController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\CriteriaPriorityValueController;
use App\Http\Controllers\CriteriaSelectedController;
use App\Http\Controllers\DashboardController;
use App\Models\Alternative;
use App\Models\CriteriaPriorityValue;
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


    Route::get('/compare/{id}', [CriteriaComparisonController::class, 'show'])->name('compare');
    Route::patch('/compare/{id}', [CriteriaComparisonController::class, 'update'])->name('compareUpdate');
    Route::get('/show/{id}', [CriteriaPriorityValueController::class, 'show'])->name('compareResult');

    Route::post('/save-priority/{id}', [CriteriaPriorityValueController::class, 'savePriorityValue'])->name('savePriorityValue');
    Route::patch('/update-priority/{id}', [CriteriaPriorityValueController::class, 'updatePriorityValue'])->name('updatePriorityValue');
});

Route::prefix('alternative')->name('admin.alternative.')->group(function () {
    Route::get('/', [AlternativeController::class, 'index'])->name('index');
    Route::get('/tambah', [AlternativeController::class, 'create'])->name('create');
    Route::post('/store', [AlternativeController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [Alternative::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [AlternativeController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [AlternativeController::class, 'destroy'])->name('destroy');

    Route::prefix('penilaian')->name('penilaian.')->group(function () {
        Route::get('/', [AlternativeValueController::class, 'index'])->name('index');
        Route::get('/tambah', [AlternativeValueController::class, 'create'])->name('create');
        Route::post('/store', [AlternativeValueController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [Alternative::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [AlternativeValueController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [AlternativeValueController::class, 'destroy'])->name('destroy');
    });
});
