<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\SubCriteriaRequest;
use App\Models\Criteria;
use App\Models\SubCriteria;
use Illuminate\Http\Request;

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
}
