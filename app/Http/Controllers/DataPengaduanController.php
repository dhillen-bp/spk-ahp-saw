<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\DataPengaduanRequest;
use App\Models\AlternativeValue;
use App\Models\CitizenReport;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class DataPengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Pengaduan::with('criteria.subCriteria')->orderByRaw("FIELD(status, 'menunggu', 'disetujui', 'ditolak')")
            ->orderBy('created_at', 'asc')
            ->paginate(10);

        return view('admin.pages.pengaduan.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.pengaduan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DataPengaduanRequest $request)
    {

        $validated = $request->validated();

        if (($validated['pengirim'] == '' || null)) {
            $validated['pengirim'] = 'Anonim';
        }

        $report = CitizenReport::create($validated);

        if ($report) {
            return redirect()->route('admin.data_pengaduan.index')->with('success_message', 'Data pengaduan berhasil ditambahkan!');
        }
        return redirect()->back()->with('error_message', 'Data pengaduan gagal ditambahkan!');
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
        $report = Pengaduan::with('alternative', 'criteria.subCriteria')->findOrFail($id);

        return view('admin.pages.pengaduan.edit', compact('report'));
    }

    public function editAsAgree(string $id)
    {
        $report = Pengaduan::with('alternative', 'criteria')->findOrFail($id);

        return view('admin.pages.pengaduan.edit', compact('report'));
    }

    public function editAsDisAgree(string $id)
    {
        $report = Pengaduan::with('alternative', 'criteria')->findOrFail($id);

        return view('admin.pages.pengaduan.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                'keterangan_balasan' => 'nullable|string',
                'fix_value' => 'required|numeric',
                'status' => 'required|in:menunggu,disetujui,ditolak',
            ],
            [

                'status.required' => 'Status harus diisi!',
                'fix_value.required' => 'Nilai harus diisi!',
                'status.in' => 'Nilai status harus menunggu, disetujui, atau ditolak!',
            ]
        );

        // Temukan laporan pengaduan berdasarkan ID
        $report = Pengaduan::with('criteria.subCriteria')->findOrFail($id);
        $report->status = $validated['status'];

        if ($validated['fix_value'] != $report->new_value && $validated['fix_value'] != $report->old_value) {
            return redirect()->back()->with('error_message', 'Nilai yang anda masukkan tidak sesuai dengan data yang lama maupun data yang diajukan warga!');
        }

        if ($report->criteria->nama == 'Usia' || $report->criteria->nama == 'Jumlah Anggota Keluarga') {
            $report->old_value = number_format($report->old_value, 0, '.', '.');
            $report->new_value = number_format($report->new_value, 0, '.', '.');
        }

        if ($report->criteria->subCriteria->isNotEmpty()) {
            $oldSubCriteria = $report->criteria->subCriteria->firstWhere('nilai', $report->old_value);
            $newSubCriteria = $report->criteria->subCriteria->firstWhere('nilai', $report->new_value);
            $FixSubCriteria = $validated['fix_value'];

            $balasan = "Data Penilaian pada kriteria  {$report->criteria->nama}, sebelumnya bernilai = {$oldSubCriteria->nama} ({$report->old_value}), lalu nilai yang anda ajukan = {$newSubCriteria->nama} ({$report->new_value}). Hasil Pemeriksaan adalah TIDAK SESUAI, karena setelah pemeriksaan data anda yang benar {$FixSubCriteria->nama} ({$validated['fix_value']}).";
        } else {
            $balasan = "Data Penilaian pada kriteria  {$report->criteria->nama}, sebelumnya bernilai = {$report->old_value}, lalu nilai yang anda ajukan = {$report->new_value}. Hasil Pemeriksaan adalah TIDAK SESUAI, karena setelah pemeriksaan data anda yaitu = {$validated['fix_value']}.";
        }

        // Cek apakah new_value sama dengan fix_value
        if ($report->new_value == $validated['fix_value'] && $validated['status'] == 'disetujui') {
            // Jika nilai sama, update alternative_value
            $alternativeValue = AlternativeValue::whereHas('alternative', function ($query) use ($report) {
                $query->where('nik', $report->nik);
            })
                ->where('criteria_id', $report->criteria_id)
                ->first();

            if ($alternativeValue) {
                $alternativeValue->nilai = $validated['fix_value'];
                $alternativeValueUpdated = $alternativeValue->save();

                if ($alternativeValueUpdated) {
                    // Simpan perubahan pada report
                    $report->keterangan_balasan = $validated['keterangan_balasan'] . ' ' . $balasan;
                    $report->save();

                    return redirect()->route('admin.data_pengaduan.index')->with('success_message', 'Data pengaduan berhasil diubah!');
                }
            }
        } else {
            // Jika nilai berbeda, tambahkan pesan default ke keterangan_balasan
            $report->keterangan_balasan = $validated['keterangan_balasan'] . ' ' . $balasan;
            $report->save();

            return redirect()->route('admin.data_pengaduan.index')->with('success_message', 'Data pengaduan berhasil diubah');
        }

        return redirect()->back()->with('error_message', 'Data pengaduan gagal diubah!');
    }

    //
    public function updateAsAgree(Request $request, string $id)
    {
        $validated = $request->validate([
            'keterangan_balasan' => 'nullable|string',
            'new_value' => 'required|numeric',
        ]);

        // Update status pengaduan
        $report = Pengaduan::findOrFail($id);
        $report->status = 'disetujui';
        $report->keterangan_balasan = $validated['keterangan_balasan'];
        $report->save();

        // Update alternative_values
        $alternativeValue = AlternativeValue::whereHas('alternative', function ($query) use ($report) {
            $query->where('nik', $report->nik);
        })
            ->where('criteria_id', $report->criteria_id)
            ->first();

        if ($alternativeValue) {
            $alternativeValue->nilai = $validated['new_value'];
            $alternativeValueUpdated = $alternativeValue->save();

            if ($alternativeValueUpdated) {
                return redirect()->route('admin.data_pengaduan.index')->with('success_message', 'Data pengaduan berhasil diubah!');
            }
        }


        return redirect()->back()->with('error_message', 'Data pengaduan gagal diubah!');
    }

    public function updateAsDisAgree(Request $request, string $id)
    {
        $validated = $request->validate([
            'keterangan_balasan' => 'nullable|string',
            'new_value' => 'required|numeric',
        ]);

        // Update status pengaduan
        $report = Pengaduan::findOrFail($id);
        $report->status = 'ditolak';
        $report->keterangan_balasan = $validated['keterangan_balasan'];
        $reportUpdated =  $report->save();

        // Update alternative_values
        $alternativeValue = AlternativeValue::whereHas('alternative', function ($query) use ($report) {
            $query->where('nik', $report->nik);
        })
            ->where('criteria_id', $report->criteria_id)
            ->first();

        if ($reportUpdated) {
            return redirect()->route('admin.data_pengaduan.index')->with('success_message', 'Data pengaduan berhasil diperbarui!');
        }


        return redirect()->back()->with('error_message', 'Data pengaduan gagal diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $report = Pengaduan::findOrFail($id);
        $report->delete();

        return redirect()->route('admin.data_pengaduan.index')->with('success_message', 'Data pengaduan berhasil dihapus!');
    }
}
