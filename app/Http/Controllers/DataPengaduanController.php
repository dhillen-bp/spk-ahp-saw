<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\DataPengaduanRequest;
use App\Models\CitizenReport;
use Illuminate\Http\Request;

class DataPengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = CitizenReport::paginate(10);
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
        $report = CitizenReport::findOrFail($id);

        return view('admin.pages.pengaduan.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DataPengaduanRequest $request, string $id)
    {
        $validated = $request->validated();

        $pengaduan = CitizenReport::findOrFail($id);

        if (($validated['pengirim'] == '' || null)) {
            $validated['pengirim'] = 'Anonim';
        }

        $kriteriaUpdated = $pengaduan->update($validated);

        if ($kriteriaUpdated) {
            return redirect()->route('admin.data_pengaduan.index')->with('success_message', 'Data pengaduan berhasil diubah!');
        }
        return redirect()->back()->with('error_message', 'Data pengaduan gagal diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $report = CitizenReport::findOrFail($id);
        $report->delete();

        return redirect()->route('admin.data_pengaduan.index')->with('success_message', 'Data pengaduan berhasil dihapus!');
    }
}
