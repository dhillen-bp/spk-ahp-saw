<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CriteriaSelected;
use App\Models\RankingResult;
use Illuminate\Http\Request;

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
            ->paginate(10);

        return view('pages.pengumuman', compact('rankingResults', 'criteriaSelected', 'selectedYear'));
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
