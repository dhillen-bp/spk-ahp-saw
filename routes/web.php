<?php

use App\Http\Controllers\Client\DataPenerimaController;
use App\Http\Controllers\Client\DataPengaduanController;
use App\Models\Criteria;
use App\Models\CriteriaSelected;
use App\Models\RankingResult;
use Database\Seeders\CriteriaSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

use function App\Helpers\formatAngka;
use function App\Helpers\getTotalKriteria;

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
    $currentYear = now()->year;

    $countCriteria = getTotalKriteria($currentYear);
    $checkPenerima = CriteriaSelected::where('nama', $currentYear)->first();
    $countPenerima = $checkPenerima->jumlah_penerima ?? 0;
    $availableBudget = formatAngka((300_000 * $countPenerima) * 12);

    return view('pages.index', compact('countCriteria', 'countPenerima', 'availableBudget'));
});

Route::get('/search', function (Request $request) {
    $query = trim($request->input('query'));
    $selectedYear =  date('Y');

    try {
        $result = RankingResult::with([
            'alternative.alternativeValues.criteria.subCriteria',
            'criteriaSelected'
        ])
            ->whereHas('alternative', function ($queryBuilder) use ($query) {
                $queryBuilder->where('nama', 'like', "%{$query}%")
                    ->orWhere('nik', '=', "{$query}");
            })
            ->where('is_verified', 1)
            ->first();

        $html = view('admin.layouts.modal_search_penerima', compact('result', 'selectedYear'))->render();

        return response()->json(['html' => $html]);
    } catch (\Exception $e) {
        // Log error message
        Log::error('Search Error: ' . $e->getMessage());
        return response()->json(['error' =>  $e->getMessage()], 500);
    }
})->name('search');

Route::prefix('pengumuman')->name('pengumuman.')->group(function () {
    Route::get('/penerima', [DataPenerimaController::class, 'index'])->name('penerima');
    Route::get('/calon-penerima', [DataPenerimaController::class, 'viewCalonPenerima'])->name('calon_penerima');
});

Route::prefix('pengaduan')->name('pengaduan.')->group(function () {
    Route::get('/', [DataPengaduanController::class, 'index'])->name('index');
    Route::get('/detail/{id}', [DataPengaduanController::class, 'show'])->name('show');
    Route::get('/tambah', [DataPengaduanController::class, 'create'])->name('create');
    Route::post('/checkNik', [DataPengaduanController::class, 'checkNik'])->name('checkNik');
    Route::get('/get-criteria-details/{id}', [DataPengaduanController::class, 'getDetails'])->name('getDetails');
    Route::post('/', [DataPengaduanController::class, 'store'])->name('store');
});
