<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\CriteriaSelectedRequest;
use App\Models\Criteria;
use App\Models\CriteriaComparison;
use App\Models\CriteriaSelected;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CriteriaSelectedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriteriaSelected = CriteriaSelected::with('criteriaComparisons')->paginate(10);

        $criteriaBySelected = [];

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

        return view('admin.pages.perbandingan.index', compact('kriteriaSelected', 'criteriaBySelected'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kriteria = Criteria::get();

        return view('admin.pages.perbandingan.create', compact('kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CriteriaSelectedRequest $request)
    {
        $validated = $request->validated();

        DB::beginTransaction();

        try {
            $criteriaSelected = CriteriaSelected::create([
                'nama' => $validated['nama'],
                'keterangan' => $validated['keterangan'],
            ]);

            if ($request->has('criteria')) {
                $totalKriteria = count($request->criteria);

                for ($i = 0; $i < $totalKriteria - 1; $i++) {
                    for ($j = $i + 1; $j < $totalKriteria; $j++) {
                        CriteriaComparison::create([
                            'criteria_selected_id' => $criteriaSelected->id,
                            'kriteria1_id' => $request->criteria[$i],
                            'kriteria2_id' => $request->criteria[$j],
                            'nilai_kriteria1' => 0,
                            'nilai_kriteria2' => 0
                        ]);
                    }
                }
            }

            DB::commit();
            return redirect()->route('admin.perbandingan.index')->with('success_message', 'Data pilihan kriteria berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error_message', 'Data pilihan kriteria gagal ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kriteria = Criteria::get();
        $kriteriaSelected = CriteriaSelected::findOrFail($id);

        return view('admin.pages.perbandingan.edit', compact('kriteriaSelected', 'kriteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CriteriaSelectedRequest $request,  $id)
    {
        $validated = $request->validated();

        DB::beginTransaction();

        try {
            $criteriaSelected = CriteriaSelected::findOrFail($id);

            $criteriaSelected->update([
                'nama' => $validated['nama'],
                'keterangan' => $validated['keterangan'],
            ]);

            // Hapus kriteria sebelumnya yang terhubung dengan kriteria yang dipilih
            $criteriaSelected->criteriaComparisons()->delete();

            if ($request->has('criteria')) {
                $totalKriteria = count($request->criteria);

                for ($i = 0; $i < $totalKriteria - 1; $i++) {
                    for ($j = $i + 1; $j < $totalKriteria; $j++) {
                        CriteriaComparison::create([
                            'criteria_selected_id' => $criteriaSelected->id,
                            'kriteria1_id' => $request->criteria[$i],
                            'kriteria2_id' => $request->criteria[$j],
                            'nilai_kriteria1' => 0,
                            'nilai_kriteria2' => 0
                        ]);
                    }
                }
            }

            DB::commit();
            return redirect()->route('admin.perbandingan.index')->with('success_message', 'Data pilihan kriteria berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error_message', 'Data pilihan kriteria gagal diperbarui!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kriteria = CriteriaSelected::findOrFail($id);
        $kriteria->delete();

        return redirect()->route('admin.perbandingan.index')->with('success_message', 'Data kriteria pilihan berhasil dihapus!');
    }
}
