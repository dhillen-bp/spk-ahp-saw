<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\AlternativeRequest;
use App\Http\Requests\Admin\CriteriaStoreRequest;
use App\Models\Criteria;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriteria = Criteria::paginate(10);

        return view('admin.pages.kriteria.index', compact('kriteria'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.kriteria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlternativeRequest $request)
    {
        $validated = $request->validated();

        $kriteria = Criteria::create($validated);

        if ($kriteria) {
            return redirect()->route('admin.kriteria.index')->with('success_message', 'Data kriteria berhasil ditambahkan!');
        }
        return redirect()->back()->with('error_message', 'Data kriteria gagal ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $criteria = Criteria::with('subCriteria')->findOrFail($id);

        return view('admin.pages.kriteria.show', compact('criteria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kriteria = Criteria::findOrFail($id);

        return view('admin.pages.kriteria.edit', compact('kriteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CriteriaStoreRequest $request,  $id)
    {
        $validated = $request->validated();

        $kriteria = Criteria::findOrFail($id);

        $kriteriaUpdated = $kriteria->update($validated);

        if ($kriteriaUpdated) {
            return redirect()->route('admin.kriteria.index')->with('success_message', 'Data kriteria berhasil diubah!');
        }
        return redirect()->back()->with('error_message', 'Data kriteria gagal diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kriteria = Criteria::findOrFail($id);
        $kriteria->delete();

        return redirect()->route('admin.kriteria.index')->with('success_message', 'Data kriteria berhasil dihapus!');
    }

    public function generatePDF()
    {
        $criteria = Criteria::get();

        $data = [
            'title' => 'Kriteria Penerima BLT Dana Desa',
            'date' => date('m/d/Y'),
            'criteria' => $criteria
        ];

        $pdf = PDF::loadView('admin.pages.kriteria.report', $data);

        session()->flash('success_message', 'Laporan kriteria berhasil diexport ke PDF!');

        return $pdf->download('criteria_report.pdf');
    }
}
