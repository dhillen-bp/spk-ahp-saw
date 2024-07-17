<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\CriteriaComparison;
use App\Models\CriteriaPriorityValue;
use App\Models\CriteriaSelected;
use Illuminate\Http\Request;

class CriteriaPriorityValueController extends Controller
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
        $criteriaSelectedId = $id;

        // Calculate criteria matrix
        [$rows, $columns] = $this->calculateCriteriaMatrix($criteriaSelectedId);

        // Calculate normalized matrix and priority values
        [$normalizedRows, $priorityValues] = $this->calculateNormalizedMatrixAndPriorityValues($rows, $columns);
        // Calculate total of priority values
        $totalPriorityValues = array_sum($priorityValues);

        // Calculate Lambda Maks
        $lambdaMaks = $this->calculateLambdaMaks($rows, $priorityValues);

        // Calculate Consistency Index (CI)
        $n = count($priorityValues);
        $ci = $this->calculateConsistencyIndex($lambdaMaks, $n);

        // Calculate Consistency Ratio (CR)
        $cr = $this->calculateConsistencyRatio($ci, $n);

        // Calculate sum of column totals for Lambda Maks table
        $sumOfColumnTotals = 0;
        foreach ($rows as $kriteria1 => $columnsData) {
            $sumOfColumnTotals += array_sum($columnsData);
        }

        // Mengecek apakah nilai prioritas pada kriteria sudah ada
        $isCriteriaPriorityValueExist = CriteriaPriorityValue::where('criteria_selected_id', $criteriaSelectedId)->exists();

        return view('admin.pages.perbandingan.compare-result', compact('criteriaSelectedId', 'isCriteriaPriorityValueExist', 'rows', 'columns', 'normalizedRows', 'priorityValues', 'totalPriorityValues', 'lambdaMaks', 'ci', 'cr', 'sumOfColumnTotals'));
    }



    public function calculateCriteriaMatrix($criteriaSelectedId)
    {
        $records = CriteriaComparison::where('criteria_selected_id', $criteriaSelectedId)
            ->orderBy('kriteria2_id')
            ->orderBy('kriteria1_id')
            ->get();

        // Fetch criteria names from the database
        $criteriaIds = $records->pluck('kriteria1_id')->merge($records->pluck('kriteria2_id'))->unique();
        $criteria = Criteria::whereIn('id', $criteriaIds)->pluck('nama', 'id')->toArray();

        $rows = [];
        $columns = array_values($criteria); // Ambil nama kriteria untuk kolom

        // Inisialisasi matriks dengan 1 untuk elemen diagonal dan 0 untuk lainnya
        foreach ($criteria as $id => $name) {
            $rows[$name] = array_fill_keys($columns, 0);
            $rows[$name][$name] = 1; // Elemen diagonal harus 1
        }

        // Isi matriks dengan nilai perbandingan
        foreach ($records as $record) {
            $name1 = $criteria[$record->kriteria1_id];
            $name2 = $criteria[$record->kriteria2_id];

            // Baris C1 Kolom C2 = nilai_kriteria1
            // Baris C2 kolom C1 = nilai_kriteria2

            // Memperbaiki logika pengisian matriks
            $rows[$name1][$name2] = $record->nilai_kriteria1;
            $rows[$name2][$name1] =  $record->nilai_kriteria2;
        }

        return [$rows, $columns];
    }


    public function calculateNormalizedMatrixAndPriorityValues($rows, $columns)
    {
        // Calculate column sums
        $columnSums = array_fill_keys($columns, 0);
        foreach ($columns as $column) {
            foreach ($rows as $row) {
                $columnSums[$column] += $row[$column];
            }
        }

        // Calculate normalized matrix and priority values
        $normalizedRows = [];
        $priorityValues = array_fill_keys(array_keys($rows), 0); // Initialize priority values with 0

        foreach ($rows as $kriteria1 => $columnsData) {
            $normalizedRow = [];
            foreach ($columnsData as $kriteria2 => $nilai) {
                if ($columnSums[$kriteria2] != 0) {
                    $normalizedValue = $nilai / $columnSums[$kriteria2];
                } else {
                    $normalizedValue = 0; // Handle division by zero
                }
                $normalizedValue = $normalizedValue; // Round to 3 decimal places
                $normalizedRow[$kriteria2] = $normalizedValue;
                $priorityValues[$kriteria1] += $normalizedValue;
            }
            $normalizedRows[$kriteria1] = $normalizedRow;
        }

        // Calculate average for priority values
        foreach ($priorityValues as $kriteria => $value) {
            $priorityValues[$kriteria] = round($value / count($columns), 3); // Round to 3 decimal places
        }

        return [$normalizedRows, $priorityValues];
    }


    public function calculateLambdaMaks($rows, $priorityValues)
    {
        $lambdaMaks = 0;

        // Calculate sum of weighted sums per row
        $sumOfWeightedSums = [];
        foreach ($rows as $kriteria1 => $columnsData) {
            $totalPerBaris = 0;
            foreach ($columnsData as $kriteria2 => $nilai) {
                // Mengalikan nilai dengan nilai prioritas yang didapat sebelumnya
                $nilaiPrioritas = $priorityValues[$kriteria2];
                $nilaiKalikan = $nilai * $nilaiPrioritas;
                $totalPerBaris += $nilaiKalikan;
            }
            // Hitung hasil bagi berdasarkan total per baris dibagi nilai prioritas kriteria pertama
            $hasilBagi = $totalPerBaris / $priorityValues[$kriteria1];
            $sumOfWeightedSums[$kriteria1] = $hasilBagi;
        }

        // Calculate Lambda Maks
        $lambdaMaks = array_sum($sumOfWeightedSums) / count($rows);

        return $lambdaMaks;
    }


    public function calculateConsistencyIndex($lambdaMaks, $n)
    {
        return ($lambdaMaks - $n) / ($n - 1);
    }

    public function calculateConsistencyRatio($ci, $n)
    {
        // Nilai Random Index (RI) untuk berbagai ukuran matriks
        $riValues = [1 => 0.00, 2 => 0.00, 3 => 0.58, 4 => 0.90, 5 => 1.12, 6 => 1.24, 7 => 1.32, 8 => 1.41, 9 => 1.45, 10 => 1.49];
        $ri = isset($riValues[$n]) ? $riValues[$n] : 1.49; // Default RI untuk ukuran matriks lebih dari 10

        return $ci / $ri;
    }

    // Simpan Priority Value
    public function savePriorityValue(Request $request, $criteriaSelectedId)
    {
        $priorities = json_decode($request->input('criteria_priorities'), true);

        // return dd($priorities);

        foreach ($priorities as $criteriaName => $priorityValue) {
            // Dapatkan id kriteria berdasarkan nama
            $criteria = Criteria::where('nama', $criteriaName)->first();

            if ($criteria) {
                CriteriaPriorityValue::updateOrCreate(
                    [
                        'criteria_selected_id' => $criteriaSelectedId,
                        'criteria_id' => $criteria->id,
                    ],
                    [
                        'nilai' => $priorityValue,
                    ]
                );
            }
        }

        return redirect()->back()->with('success_message', 'Bobot Prioritas berhasil disimpan!');
    }

    public function updatePriorityValue(Request $request, $criteriaSelectedId)
    {
        $priorities = json_decode($request->input('criteria_priorities'), true);

        foreach ($priorities as $criteriaName => $priorityValue) {
            $criteria = Criteria::where('nama', $criteriaName)->first();

            if ($criteria) {
                CriteriaPriorityValue::updateOrCreate(
                    [
                        'criteria_selected_id' => $criteriaSelectedId,
                        'criteria_id' => $criteria->id,
                    ],
                    [
                        'nilai' => $priorityValue,
                    ]
                );
            }
        }

        return redirect()->back()->with('success_message', 'Bobot Prioritas berhasil diperbarui!');
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

    public function result(CriteriaSelected $criteriaSelected)
    {

        // $isAbleToRank = $this->checkIfAbleToRank();

        return view('admin.pages.perbandingan.compare-result', [
            'title'             => 'Hasil Perbandingan',
            'criteria_selected' => $criteriaSelected,

            // 'isAbleToRank'      => $isAbleToRank,
        ]);
    }
}
