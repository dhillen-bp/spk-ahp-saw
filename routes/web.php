<?php

use App\Http\Controllers\Client\DataPenerimaController;
use App\Http\Controllers\Client\DataPengaduanController;
use App\Models\CriteriaSelected;
use Database\Seeders\CriteriaSeeder;
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
    $countCriteria = CriteriaSelected::count();
    $countPenerima = CriteriaSelected::count();
    $availableBudget = 20000; // Replace with your logic to get the available budget
    return view('pages.index');
});

Route::prefix('pengumuman')->name('pengumuman.')->group(function () {
    Route::get('/penerima', [DataPenerimaController::class, 'index'])->name('penerima');
    Route::get('/calon-penerima', [DataPenerimaController::class, 'viewCalonPenerima'])->name('calon_penerima');
});

Route::prefix('pengaduan')->name('pengaduan.')->group(function () {
    Route::get('/', [DataPengaduanController::class, 'index'])->name('index');
    Route::get('/detail/{id}', [DataPengaduanController::class, 'show'])->name('show');
    Route::get('/tambah', [DataPengaduanController::class, 'create'])->name('create');
    Route::post('/', [DataPengaduanController::class, 'store'])->name('store');
});
