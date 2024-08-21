<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Alternative;
use App\Models\AlternativeValue;
use App\Models\CitizenReport;
use App\Models\Criteria;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class DataPengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengaduan = Pengaduan::with('alternative', 'criteria')->paginate(10);
        return view('pages.pengaduan', compact('pengaduan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $criterias = Criteria::with('subCriteria', 'alternativeValues')->get();

        return view('pages.pengaduan-create', compact('criterias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'nik' => 'required|string',
                'criteria_to_edit' => 'required|exists:criteria,id',
                'new_value' => 'required|string',
                'deskripsi_aduan' => 'nullable|string',
            ],
            [
                'nik.required' => 'NIK anda  harus diisi.',
                'new_value.required' => 'Data pembaruan anda harus diisi.',
                'criteria_to_edit.required' => 'Data kriteria yang akan diperbarui anda harus diisi.',
            ]
        );

        // Ambil nilai lama berdasarkan NIK dan kriteria yang dipilih
        $oldValue = AlternativeValue::whereHas('alternative', function ($query) use ($validated) {
            $query->where('nik', $validated['nik']);
        })
            ->where('criteria_id', $validated['criteria_to_edit'])
            ->value('nilai');

        // Jika nilai lama tidak ditemukan, Anda bisa menangani situasi ini
        if ($oldValue === null) {
            $oldValue = ''; // Atau nilai default lain
        }

        // Gunakan create untuk menyimpan data
        $aduan = Pengaduan::create([
            'nik' => $validated['nik'],
            'criteria_id' => $validated['criteria_to_edit'],
            'old_value' => $oldValue, // Pastikan Anda menentukan nilai lama dengan benar
            'new_value' => $validated['new_value'],
            'status' => 'menunggu', // Status default
            'deskripsi_aduan' => $validated['deskripsi_aduan'] ?? null,
            'keterangan_balasan' => $validated['keterangan_balasan'] ?? null,
        ]);

        if ($aduan) {
            return redirect()->route('pengaduan.index')->with('success_message', 'Aduan anda berhasil ditambahkan!');
        }
        return redirect()->back()->with('error_message', 'Aduan anda gagal ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengaduan = Pengaduan::with('alternative', 'criteria')->findOrFail($id);
        return view('pages.pengaduan-detail', compact('pengaduan'));
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

    public function checkNik(Request $request)
    {
        $request->validate([
            'nik' => 'required|exists:alternatives,nik',
        ]);

        $alternative = Alternative::with('alternativeValues')->where('nik', $request->nik)->first();

        if ($alternative) {
            // Membuat array untuk menyimpan nilai kriteria
            $criteriaValues = $alternative->alternativeValues->pluck('nilai', 'criteria_id');

            return response()->json([
                'status' => 'success',
                'nama' => $alternative->nama,
                'criteria_values' => $criteriaValues,
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'NIK tidak ditemukan.',
        ], 404);
    }

    // CriteriaController.php
    public function getDetails($id)
    {
        $criteria = Criteria::with('subcriteria')->find($id);

        if (!$criteria) {
            return response()->json(['status' => 'error', 'message' => 'Kriteria tidak ditemukan'], 404);
        }

        return response()->json([
            'status' => 'success',
            'subcriteria' => $criteria->subcriteria
        ]);
    }
}
