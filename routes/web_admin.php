<?php

use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\AlternativeValueController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CriteriaComparisonController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\CriteriaPriorityValueController;
use App\Http\Controllers\CriteriaSelectedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataAdminController;
use App\Http\Controllers\DataPenerimaController;
use App\Http\Controllers\DataPengaduanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RankingResultController;
use App\Http\Controllers\SubCriteriaController;
use App\Models\Alternative;
use App\Models\CriteriaPriorityValue;
use App\Models\SubCriteria;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('admin.index')->middleware('role:pemerintah_desa,rt_rw');

Route::get('/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('/login', [AuthController::class, 'loginAction'])->name('admin.login.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout')->middleware('role:pemerintah_desa,rt_rw');

Route::prefix('kriteria')->name('admin.kriteria.')->middleware('role:pemerintah_desa,rt_rw')->group(function () {
    Route::get('/', [CriteriaController::class, 'index'])->name('index');
    Route::get('/show/{id}', [CriteriaController::class, 'show'])->name('show');

    Route::middleware('role:pemerintah_desa')->group(function () {
        Route::get('/tambah', [CriteriaController::class, 'create'])->name('create');
        Route::post('/store', [CriteriaController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CriteriaController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [CriteriaController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [CriteriaController::class, 'destroy'])->name('destroy');

        Route::get('/report', [CriteriaController::class, 'generatePDF'])->name('report');
    });

    Route::prefix('sub')->name('sub.')->group(function () {
        Route::get('/tambah/{criteria_id}', [SubCriteriaController::class, 'create'])->name('create');
        Route::post('/store', [SubCriteriaController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [SubCriteriaController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [SubCriteriaController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [SubCriteriaController::class, 'destroy'])->name('destroy');

        Route::get('/compare/{id}', [SubCriteriaController::class, 'compareShow'])->name('compare');
        Route::patch('/compare/{criteriaId}', [SubCriteriaController::class, 'updateSubCriteriaComparison'])->name('compare_update');
        Route::get('/show/{criteriaId}', [SubCriteriaController::class, 'showAHP'])->name('compareCalculate');
        Route::patch('/compare-result/{criteriaId}', [SubCriteriaController::class, 'updateSubCriteriaValue'])->name('compareSaveValue');
    });
});

Route::prefix('perbandingan')->name('admin.perbandingan.')->middleware('role:pemerintah_desa,rt_rw')->group(function () {
    Route::get('/', [CriteriaSelectedController::class, 'index'])->name('index');

    Route::middleware('role:pemerintah_desa')->group(function () {
        Route::get('/tambah', [CriteriaSelectedController::class, 'create'])->name('create');
        Route::post('/store', [CriteriaSelectedController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CriteriaSelectedController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [CriteriaSelectedController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [CriteriaSelectedController::class, 'destroy'])->name('destroy');
    });

    Route::get('/compare/{id}', [CriteriaComparisonController::class, 'show'])->name('compare');
    Route::patch('/compare/{id}', [CriteriaComparisonController::class, 'update'])->name('compareUpdate')->middleware('role:pemerintah_desa');
    Route::get('/show/{id}', [CriteriaPriorityValueController::class, 'show'])->name('compareResult');

    Route::post('/save-priority/{id}', [CriteriaPriorityValueController::class, 'savePriorityValue'])->name('savePriorityValue')->middleware('role:pemerintah_desa');
    Route::patch('/update-priority/{id}', [CriteriaPriorityValueController::class, 'updatePriorityValue'])->name('updatePriorityValue')->middleware('role:pemerintah_desa');
});

Route::prefix('alternative')->name('admin.alternative.')->middleware('role:pemerintah_desa,rt_rw')->group(function () {
    Route::get('/', [AlternativeController::class, 'index'])->name('index');

    Route::get('/tambah', [AlternativeController::class, 'create'])->name('create');
    Route::post('/store', [AlternativeController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [AlternativeController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [AlternativeController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [AlternativeController::class, 'destroy'])->name('destroy');

    Route::middleware('role:pemerintah_desa')->group(function () {
        Route::get('/edit/{id}', [AlternativeController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [AlternativeController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [AlternativeController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('penilaian')->name('penilaian.')->group(function () {
        Route::get('/', [AlternativeValueController::class, 'index'])->name('index');
        Route::get('/detail/{id}', [AlternativeValueController::class, 'show'])->name('show');

        Route::get('/tambah', [AlternativeValueController::class, 'create'])->name('create');
        Route::post('/store', [AlternativeValueController::class, 'store'])->name('store');

        Route::middleware('role:pemerintah_desa')->group(function () {
            Route::get('/edit/{id}', [AlternativeValueController::class, 'edit'])->name('edit');
            Route::patch('/update/{id}', [AlternativeValueController::class, 'update'])->name('update');
            Route::delete('/destroy/{id}', [AlternativeValueController::class, 'destroy'])->name('destroy');
        });
    });
});

Route::prefix('pemeringkatan')->name('admin.pemeringkatan.')->middleware('role:pemerintah_desa,rt_rw')->group(function () {
    Route::get('/', [RankingResultController::class, 'index'])->name('index');

    Route::middleware('role:pemerintah_desa')->group(function () {
        Route::get('/tambah', [RankingResultController::class, 'create'])->name('create');
        Route::post('/store', [RankingResultController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [RankingResultController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [RankingResultController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [RankingResultController::class, 'destroy'])->name('destroy');
    });

    Route::get('/result/{criteria_selected_id}', [RankingResultController::class, 'showSAWResult'])->name('result');
    Route::post('/result', [RankingResultController::class, 'saveSAWResult'])->name('saveSAWResult')->middleware('role:pemerintah_desa');
});

Route::prefix('data-penerima')->name('admin.penerima.')->middleware('role:pemerintah_desa,rt_rw')->group(function () {
    Route::get('/', [DataPenerimaController::class, 'index'])->name('index');
    Route::get('/calon-penerima', [DataPenerimaController::class, 'viewCalonPenerima'])->name('calon');

    Route::middleware('role:pemerintah_desa')->group(function () {
        Route::patch('/verifikasi/{id}', [DataPenerimaController::class, 'changeVerified'])->name('verifikasi');
        Route::get('/report', [DataPenerimaController::class, 'generatePDF'])->name('report');
        Route::get('/report_calon', [DataPenerimaController::class, 'generatePDFCalon'])->name('report_calon');
        Route::get('/export_excel', [DataPenerimaController::class, 'exportExcel'])->name('exportExcel');
        Route::get('/export_excel_calon', [DataPenerimaController::class, 'exportExcelCalon'])->name('exportExcelCalon');
    });
});

Route::prefix('profil')->name('admin.profil.')->middleware('role:pemerintah_desa,rt_rw')->group(function () {
    Route::get('/', [ProfilController::class, 'index'])->name('index');
    Route::patch('/', [ProfilController::class, 'update'])->name('update');
});

Route::prefix('data-admin')->name('admin.data_admin.')->middleware('role:pemerintah_desa')->group(function () {
    Route::get('/', [DataAdminController::class, 'index'])->name('index');
    Route::get('/tambah', [DataAdminController::class, 'create'])->name('create');
    Route::post('/store', [DataAdminController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [DataAdminController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [DataAdminController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [DataAdminController::class, 'destroy'])->name('destroy');
});

Route::prefix('data-pengaduan')->name('admin.data_pengaduan.')->middleware('role:pemerintah_desa')->group(function () {
    Route::get('/', [DataPengaduanController::class, 'index'])->name('index');
    Route::get('/tambah', [DataPengaduanController::class, 'create'])->name('create');
    Route::post('/store', [DataPengaduanController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [DataPengaduanController::class, 'edit'])->name('edit');
    Route::get('/edit/{id}/setuju', [DataPengaduanController::class, 'editAsAgree'])->name('editAsAgree');
    Route::get('/edit/{id}/tolak', [DataPengaduanController::class, 'editAsDisAgree'])->name('editAsDisAgree');
    Route::patch('/update/{id}', [DataPengaduanController::class, 'update'])->name('update');
    Route::patch('/update/{id}/setuju', [DataPengaduanController::class, 'updateAsAgree'])->name('updateAsAgree');
    Route::patch('/update/{id}/tolak', [DataPengaduanController::class, 'updateAsDisAgree'])->name('updateAsDisAgree');
    Route::delete('/destroy/{id}', [DataPengaduanController::class, 'destroy'])->name('destroy');
});
