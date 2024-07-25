<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CitizenReport;
use Illuminate\Http\Request;

class DataPengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengaduan = CitizenReport::paginate(10);
        return view('pages.pengaduan', compact('pengaduan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pengaduan-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'judul' => ['required'],
                'pengirim' => ['nullable'],
                'deskripsi' => ['required'],
            ],
            [
                'judul.required' => 'Judul aduan harus diisi.',
                'deskripsi.required' => 'Deskripsi aduan harus diisi.',
            ]
        );

        if (($validated['pengirim'] == '' || null)) {
            $validated['pengirim'] = 'Anonim';
        }

        $report = CitizenReport::create($validated);

        if ($report) {
            return redirect()->route('pengaduan.index')->with('success_message', 'Aduan anda berhasil ditambahkan!');
        }
        return redirect()->back()->with('error_message', 'Aduan anda gagal ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengaduan = CitizenReport::findOrFail($id);
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
}
