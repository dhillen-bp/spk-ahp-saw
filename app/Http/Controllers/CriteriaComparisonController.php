<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\CriteriaComparison;
use Illuminate\Http\Request;

class CriteriaComparisonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    public function show($id)
    {
        $criteriaComparison = CriteriaComparison::with('criteriaSelected')->where('criteria_selected_id', '=', $id)->get();
        $criteriaSelectedId = $id;

        return view('admin.pages.perbandingan.compare', compact('criteriaComparison', 'criteriaSelectedId'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $criteriaSelectedId)
    {
        $nilai = $request->input('nilai');
        $mapping = [
            -7 => -9,
            -6 => -8,
            -5 => -7,
            -4 => -6,
            -3 => -5,
            -2 => -4,
            -1 => -3,
            0 => -2,
        ];

        foreach ($nilai as $id => $value) {
            // Ubah nilai sesuai dengan pemetaan
            if (array_key_exists($value, $mapping)) {
                $nilai[$id] = $mapping[$value];
            }

            // Lakukan perhitungan sesuai dengan skala kepentingan AHP
            if ($nilai[$id] <= 0) {
                $nilaiKriteria2 = abs($nilai[$id]);
                $nilaiKriteria1 = 1 / $nilaiKriteria2;
            } else {
                $nilaiKriteria1 = $nilai[$id];
                $nilaiKriteria2 = 1 / $nilai[$id];
            }

            // Simpan nilai-nilai baru ke dalam tabel perbandingan berpasangan
            CriteriaComparison::where('criteria_selected_id', $criteriaSelectedId)
                ->where('id', $id) // Filter berdasarkan ID dari input form
                ->update([
                    'nilai_kriteria1' => $nilaiKriteria1,
                    'nilai_kriteria2' => $nilaiKriteria2,
                ]);
        }

        return redirect()->back()->with('success_message', 'Perbandingan berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
