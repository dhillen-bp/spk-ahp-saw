<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\AlternativeValue;
use App\Models\Criteria;
use App\Models\CriteriaPriorityValue;
use App\Models\CriteriaSelected;
use App\Models\RankingResult;
use Illuminate\Http\Request;

class RankingResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriteriaSelected = CriteriaSelected::with('criteriaComparisons', 'criteriaPriorityValues')->paginate(10);

        $criteriaBySelected = [];

        $alternativeValues = AlternativeValue::select('alternative_id')->distinct()->get();

        foreach ($kriteriaSelected as $selected) {
            $kriteriaIds = collect();

            foreach ($selected->criteriaComparisons as $comparison) {
                $kriteriaIds->push($comparison->kriteria1_id);
                $kriteriaIds->push($comparison->kriteria2_id);
            }

            // Menghapus duplikat
            $uniqueKriteriaIds = $kriteriaIds->unique();

            // Menampilkan kriteria berdasarkan uniq
            $criteriaNames = Criteria::whereIn('id', $uniqueKriteriaIds)->pluck('nama');

            // Simpan kriteria ke array asosiatif
            $criteriaBySelected[$selected->id] = $criteriaNames;
        }

        return view('admin.pages.pemeringkatan.index', compact('kriteriaSelected', 'criteriaBySelected', 'alternativeValues'));
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

    public function showSAWResult($criteriaSelectedId)
    {

        // Menghitung SAW
        list($normalizedMatrix, $ranking) = $this->calculateSAW($criteriaSelectedId);

        // Ambil data kriteria untuk header tabel
        $criteria = Criteria::all();

        $criteriaPriorityValue = CriteriaPriorityValue::with('criteria')->where('criteria_selected_id', $criteriaSelectedId)->get();

        // Ambil nilai alternatif dari database
        $alternativeValues = [];
        $alternatives = AlternativeValue::with('alternative')->get();
        foreach ($alternatives as $alternative) {
            $alternativeValues[$alternative->alternative->nama][$alternative->criteria_id] = $alternative->nilai;
        }

        return view('admin.pages.pemeringkatan.show', compact('criteriaSelectedId',  'criteria', 'criteriaPriorityValue', 'normalizedMatrix', 'ranking', 'alternativeValues'));
    }

    public function calculateSAW($criteriaSelectedId)
    {
        $alternatives = Alternative::all();
        $criteria = Criteria::all();

        // Buat matriks keputusan
        $decisionMatrix = [];
        foreach ($alternatives as $alternative) {
            $row = [];
            foreach ($criteria as $criterion) {
                $alternativeValue = AlternativeValue::where('alternative_id', $alternative->id)
                    ->where('criteria_id', $criterion->id)
                    ->first();
                $row[$criterion->nama] = $alternativeValue ? $alternativeValue->nilai : 0;
            }
            $decisionMatrix[$alternative->id] = $row;  // Menggunakan ID sebagai kunci
        }

        // Normalisasi matriks keputusan
        $normalizedMatrix = [];
        foreach ($criteria as $criterion) {
            $column = array_column($decisionMatrix, $criterion->nama);
            if ($criterion->atribut === 'benefit') {
                $maxValue = max($column);
                foreach ($decisionMatrix as $altId => $values) {
                    $normalizedMatrix[$altId][$criterion->nama] = $values[$criterion->nama] / $maxValue;
                }
            } else { // Atribut 'cost'
                $minValue = min($column);
                foreach ($decisionMatrix as $altId => $values) {
                    $normalizedMatrix[$altId][$criterion->nama] = $minValue / $values[$criterion->nama];
                }
            }
        }

        // Mengalikan dengan bobot kriteria
        $weights = CriteriaPriorityValue::where('criteria_selected_id', $criteriaSelectedId)->pluck('nilai', 'criteria_id')->toArray();
        $weightedMatrix = [];
        foreach ($normalizedMatrix as $altId => $values) {
            $weightedMatrix[$altId] = 0;
            foreach ($values as $criteriaName => $normalizedValue) {
                $criteriaId = Criteria::where('nama', $criteriaName)->first()->id;
                $weightedMatrix[$altId] += $normalizedValue * $weights[$criteriaId];
            }
        }

        // Perangkingan alternatif berdasarkan skor tertinggi
        arsort($weightedMatrix);

        return [$normalizedMatrix, $weightedMatrix];
    }

    public function saveSAWResult(Request $request)
    {
        $ranking = json_decode($request->input('ranking'), true);

        foreach ($ranking as $alternativeId => $skorTotal) {
            RankingResult::updateOrCreate(
                [
                    'alternative_id' => $alternativeId,
                    'criteria_selected_id' => $request->input('criteria_selected_id')
                ],
                [
                    'skor_total' => $skorTotal,
                ],
            );
        }

        return redirect()->back()->with('success_message', 'Hasil SAW berhasil disimpan!');
    }
}
