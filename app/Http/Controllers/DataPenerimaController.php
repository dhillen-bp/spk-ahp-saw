<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\PenerimaVerifiedRequest;
use App\Models\CriteriaSelected;
use App\Models\RankingResult;
use Barryvdh\DomPDF\Facade\Pdf;
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
            })->where('is_verified', 1)->orderByDesc('skor_total')
            ->take($jumlahPenerima)->get();


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

        return view('admin.pages.penerima.index', compact('paginatedResults', 'criteriaSelected', 'selectedYear'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function changeVerified(PenerimaVerifiedRequest $request, $id)
    {
        $validated = $request->validated();

        $penerima = RankingResult::findOrFail($id);

        if (isset($validated['is_verified']) && $validated['is_verified'] == 1) {
            $validated['is_verified_desc'] = null;
        }

        $penerimaUpdated = $penerima->update($validated);

        if ($penerimaUpdated) {
            return redirect()->route('admin.penerima.index')->with('success_message', 'Verifikasi Data Penerima berhasil diperbarui!');
        }

        return redirect()->back()->with('error_message', 'Verifikasi Data Penerima gagal diperbarui!');
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
            })
            ->orderByDesc('skor_total')
            ->paginate(10);

        return view('admin.pages.penerima.calon-penerima', compact('rankingResults', 'criteriaSelected', 'selectedYear'));
    }

    public function generatePDF(Request $request)
    {
        $selectedYear = ($request->input('tahun', date('Y')) ?? date('Y'));

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
            })->where('is_verified', 1)->orderByDesc('skor_total')->get();

        $data = [
            'title' => 'Data Penerima BLT Dana Desa',
            'date' => date('Y'),
            'rankingResults' => $rankingResults
        ];

        // return dd($rankingResults);

        $pdf = PDF::loadView('admin.pages.penerima.report', $data);

        session()->flash('success_message', 'Laporan data penerima berhasil diexport ke PDF!');

        return $pdf->download('laporan_penerima.pdf');
    }

    public function generatePDFCalon(Request $request)
    {
        $selectedYear = ($request->input('tahun', date('Y')) ?? date('Y'));

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
            })->orderByDesc('skor_total')->get();

        $data = [
            'title' => 'Data Calon Penerima BLT Dana Desa',
            'date' => date('Y'),
            'rankingResults' => $rankingResults
        ];

        // return dd($rankingResults);

        $pdf = PDF::loadView('admin.pages.penerima.report-calon', $data);

        session()->flash('success_message', 'Laporan data pcalon enerima berhasil diexport ke PDF!');

        return $pdf->download('laporan_calon_penerima.pdf');
    }

    public function exportExcel(Request $request)
    {
        $selectedYear = ($request->input('tahun', date('Y')) ?? date('Y'));

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
            })->where('is_verified', 1)->orderByDesc('skor_total')->get();

        $data = [
            'title' => 'Data Penerima BLT Dana Desa',
            'date' => date('Y'),
            'rankingResults' => $rankingResults
        ];

        // return dd($rankingResults);

        session()->flash('success_message', 'Laporan data penerima berhasil diexport ke PDF!');
        return view('admin.pages.penerima.export-excel', compact('rankingResults'));
    }

    public function exportExcelCalon(Request $request)
    {
        $selectedYear = ($request->input('tahun', date('Y')) ?? date('Y'));

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
            })->orderByDesc('skor_total')->get();

        $data = [
            'title' => 'Data Penerima BLT Dana Desa',
            'date' => date('Y'),
            'rankingResults' => $rankingResults
        ];

        // return dd($rankingResults);

        session()->flash('success_message', 'Laporan data calon penerima berhasil diexport ke PDF!');
        return view('admin.pages.penerima.export-excel-calon', compact('rankingResults'));
    }
}
