<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\SubCriteriaRequest;
use App\Models\Criteria;
use App\Models\SubCriteria;
use App\Models\SubCriteriaComparison;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($criteria_id)
    {
        $criteria = Criteria::findOrFail($criteria_id);
        return view('admin.pages.kriteria.sub.create', compact('criteria', 'criteria_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubCriteriaRequest $request)
    {
        $validated = $request->validated();
        $criteria_id = $validated['criteria_id'];

        $subkriteria = SubCriteria::create($validated);

        if ($subkriteria) {
            return redirect()->route('admin.kriteria.show', $criteria_id)->with('success_message', 'Data subkriteria berhasil ditambahkan!');
        }
        return redirect()->back()->with('error_message', 'Data subkriteria gagal ditambahkan!');
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
        $subcriteria = SubCriteria::with('criteria')->findOrFail($id);

        return view('admin.pages.kriteria.sub.edit', compact('subcriteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubCriteriaRequest $request, $id)
    {
        $validated = $request->validated();

        $subkriteria = SubCriteria::with('criteria')->findOrFail($id);

        $subkriteriaUpdated = $subkriteria->update($validated);

        if ($subkriteriaUpdated) {
            return redirect()->route('admin.kriteria.show', $subkriteria->criteria->id)->with('success_message', 'Data subkriteria berhasil diubah!');
        }
        return redirect()->back()->with('error_message', 'Data subkriteria gagal diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subkriteria = SubCriteria::with('criteria')->findOrFail($id);

        $subkriteria->delete();

        return redirect()->route('admin.kriteria.show', $subkriteria->criteria->id)->with('success_message', 'Data subkriteria berhasil dihapus!');
    }

    function compareShow($id)
    {
        $subCriterias = SubCriteria::where('criteria_id', '=', $id)->get();

        for ($i = 0; $i < count($subCriterias); $i++) {
            for ($j = $i + 1; $j < count($subCriterias); $j++) {
                SubCriteriaComparison::firstOrCreate([
                    'sub_criteria1_id' => $subCriterias[$i]->id,
                    'sub_criteria2_id' => $subCriterias[$j]->id,
                    'criteria_id' => $id
                ], [
                    'nilai_sub_criteria1' => 0, // default value, you can set according to your needs
                    'nilai_sub_criteria2' => 0  // default value, you can set according to your needs
                ]);
            }
        }

        $subCriteriaComparison = SubCriteriaComparison::with('criteria')->where('criteria_id', '=', $id)->get();
        $criteriaId = $id;

        return view('admin.pages.kriteria.sub.compare-sub', compact('subCriteriaComparison', 'criteriaId'));
    }

    public function updateSubCriteriaComparison(Request $request, $criteriaId)
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

            // return dd($nilai[$id]);
            // Lakukan perhitungan sesuai dengan skala kepentingan AHP
            if ($nilai[$id] < -1) {
                $nilaiSubKriteria1 = abs($nilai[$id]);
                $nilaiSubKriteria2 = 1 / $nilaiSubKriteria1;
                // return dd($nilai[$id] . " - " . $nilaiSubKriteria1);
            } else {
                // return (dd($nilai[$id]));
                $nilaiSubKriteria2 = $nilai[$id];
                $nilaiSubKriteria1 = 1 / $nilaiSubKriteria2;
                // return dd($nilai[$id] . " - " . $nilaiSubKriteria1);
            }

            // Simpan nilai-nilai baru ke dalam tabel perbandingan berpasangan
            SubCriteriaComparison::where('criteria_id', $criteriaId)
                ->where('id', $id) // Filter berdasarkan ID dari input form
                ->update([
                    'nilai_sub_criteria1' => $nilaiSubKriteria1,
                    'nilai_sub_criteria2' => $nilaiSubKriteria2,
                ]);
        }

        return redirect()->back()->with('success_message', 'Perbandingan berhasil disimpan!');
    }

    public function showAHP($criteriaId)
    {

        // Calculate criteria matrix
        [$rows, $columns] = $this->calculateCriteriaMatrix($criteriaId);

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
        $isSubCriteriaPriorityValueExist = SubCriteria::where('criteria_id', $criteriaId)->exists();

        return view('admin.pages.kriteria.sub.compare-calculate', compact('criteriaId', 'isSubCriteriaPriorityValueExist', 'rows', 'columns', 'normalizedRows', 'priorityValues', 'totalPriorityValues', 'lambdaMaks', 'ci', 'cr', 'sumOfColumnTotals'));
    }


    //  AHP
    public function calculateCriteriaMatrix($criteriadId)
    {
        $records = SubCriteriaComparison::where('criteria_id', $criteriadId)
            ->orderBy('sub_criteria2_id')
            ->orderBy('sub_criteria1_id')
            ->get();

        // Fetch criteria names from the database
        $criteriaIds = $records->pluck('sub_criteria1_id')->merge($records->pluck('sub_criteria2_id'))->unique();
        $subCriteria = SubCriteria::whereIn('id', $criteriaIds)->pluck('nama', 'id')->toArray();

        $rows = [];
        $columns = array_values($subCriteria); // Ambil nama kriteria untuk kolom

        // Inisialisasi matriks dengan 1 untuk elemen diagonal dan 0 untuk lainnya
        foreach ($subCriteria as $id => $name) {
            $rows[$name] = array_fill_keys($columns, 0);
            $rows[$name][$name] = 1; // Elemen diagonal harus 1
        }

        // Isi matriks dengan nilai perbandingan
        foreach ($records as $record) {
            $name1 = $subCriteria[$record->sub_criteria1_id];
            $name2 = $subCriteria[$record->sub_criteria2_id];

            // Baris C1 Kolom C2 = nilai_sub_criteria1
            // Baris C2 kolom C1 = nilai_sub_criteria2

            // Memperbaiki logika pengisian matriks
            $rows[$name1][$name2] = $record->nilai_sub_criteria1;
            $rows[$name2][$name1] =  $record->nilai_sub_criteria2;
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

    public function updateSubCriteriaValue(Request $request, $criteriaId)
    {
        $priorities = json_decode($request->input('subcriteria_value'), true);

        foreach ($priorities as $criteriaName => $priorityValue) {
            $subcriteria = SubCriteria::where('nama', $criteriaName)->where('criteria_id', $criteriaId)->first();

            if ($subcriteria) {
                $subcriteria->update([
                    'nilai' => $priorityValue,
                ]);
            }
        }

        return redirect()->back()->with('success_message', 'Nilai Subkriteria berhasil diperbarui!');
    }
}
