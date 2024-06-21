<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\AlternativeValueStoreRequest;
use App\Models\Alternative;
use App\Models\AlternativeValue;
use App\Models\Criteria;
use Illuminate\Http\Request;

class AlternativeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatives = Alternative::with('alternativeValues', 'alternativeValues.criteria.subCriteria')->whereHas('alternativeValues')->paginate(10);

        $criterias = Criteria::all();
        return view('admin.pages.alternative.penilaian.index', compact('alternatives', 'criterias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $criterias = Criteria::with('subCriteria')->get();
        $alternatives = Alternative::whereDoesntHave('alternativeValues')->get();
        return view('admin.pages.alternative.penilaian.create', compact('criterias', 'alternatives'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlternativeValueStoreRequest $request)
    {
        $validated = $request->validated();

        $alternativeId = $request->input('alternative_id');
        $criteriaValues = $request->input('criteria_values');

        // return dd($criteriaValues);

        foreach ($criteriaValues as $criteriaId => $value) {
            AlternativeValue::create([
                'alternative_id' => $alternativeId,
                'criteria_id' => $criteriaId,
                'nilai' => $value,
            ]);
        }

        return redirect()->route('admin.alternative.penilaian.index')->with('success_message', 'Data penilaian alternative berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $alternative = Alternative::with('alternativeValues', 'alternativeValues.criteria.subCriteria')->findOrFail($id);

        return view('admin.pages.alternative.penilaian.show', compact('alternative'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Memuat data alternatif beserta nilai kriterianya
        $alternative = Alternative::with('alternativeValues')->findOrFail($id);

        // Memuat semua kriteria beserta subkriteria
        $criterias = Criteria::with('subCriteria')->get();

        // Memuat alternatif yang tidak memiliki nilai atau selain yang sedang diedit
        $alternatives = Alternative::whereDoesntHave('alternativeValues')->orWhere('id', $id)->get();

        return view('admin.pages.alternative.penilaian.edit', compact('alternative', 'criterias', 'alternatives'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AlternativeValueStoreRequest $request,  $id)
    {
        $validated = $request->validated();

        $alternative = Alternative::findOrFail($id);

        // Update alternative values
        foreach ($validated['criteria_values'] as $criteriaId => $value) {
            $alternativeValue = AlternativeValue::firstOrNew([
                'alternative_id' => $alternative->id,
                'criteria_id' => $criteriaId,
            ]);

            // Update nilai dari alternative value
            $alternativeValue->nilai = $value;
            $alternativeValue->save();
        }

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('admin.alternative.penilaian.index')->with('success', 'Penilaian alternatif berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Hapus semua AlternativeValue berdasarkan alternative_id
        AlternativeValue::where('alternative_id', $id)->delete();

        return redirect()->route('admin.alternative.penilaian.index')
            ->with('success', 'Data penilaian alternatif berhasil dihapus!');
    }
}
