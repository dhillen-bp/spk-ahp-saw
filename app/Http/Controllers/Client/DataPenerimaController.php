<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CriteriaSelected;
use App\Models\RankingResult;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class DataPenerimaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $selectedYear = $request->input('tahun', date('Y'));

        $criteriaSelected = CriteriaSelected::select('nama', 'id')->distinct()->get();

        $jumlahPenerima = CriteriaSelected::select('jumlah_penerima')
            ->where('nama', $selectedYear)
            ->value('jumlah_penerima');

        $rankingResults = RankingResult::with([
            'alternative.alternativeValues' => function ($query) use ($selectedYear) {
                $query->whereHas('criteria.criteriaPriorityValues', function ($query) use ($selectedYear) {
                    $query->whereHas('criteriaSelected', function ($query) use ($selectedYear) {
                        $query->where('nama', $selectedYear);
                    });
                });
            },
            'alternative.alternativeValues.criteria.subCriteria',
            'criteriaSelected'
        ])
            ->whereHas('criteriaSelected', function ($query) use ($selectedYear) {
                $query->where('nama', $selectedYear);
            })->where('is_verified', 1)->orderByDesc('skor_total')->take($jumlahPenerima)
            ->get();

        // Mendapatkan halaman saat ini
        $page = Paginator::resolveCurrentPage();

        // Membagi koleksi ke halaman dengan jumlah item per halaman
        $paginatedResults = new LengthAwarePaginator(
            $rankingResults->forPage($page, $perPage = 10), // Data untuk halaman ini
            $rankingResults->count(), // Total item dalam koleksi
            $perPage, // Jumlah item per halaman
            $page, // Halaman saat ini
            ['path' => Paginator::resolveCurrentPath()] // URL path untuk pagination
        );

        return view('pages.pengumuman', compact('paginatedResults', 'criteriaSelected', 'selectedYear'));
    }

    public function viewCalonPenerima(Request $request)
    {
        $selectedYear = $request->input('tahun', date('Y'));

        $criteriaSelected = CriteriaSelected::select('nama', 'id')->distinct()->get();

        $rankingResults = RankingResult::with([
            'alternative.alternativeValues' => function ($query) use ($selectedYear) {
                $query->whereHas('criteria.criteriaPriorityValues', function ($query) use ($selectedYear) {
                    $query->whereHas('criteriaSelected', function ($query) use ($selectedYear) {
                        $query->where('nama', $selectedYear);
                    });
                });
            },
            'alternative.alternativeValues.criteria.subCriteria',
            'criteriaSelected'
        ])
            ->whereHas('criteriaSelected', function ($query) use ($selectedYear) {
                $query->where('nama', $selectedYear);
            })->orderByDesc('skor_total')
            ->paginate(10);

        return view('pages.calon-penerima', compact('rankingResults', 'criteriaSelected', 'selectedYear'));
    }
}
