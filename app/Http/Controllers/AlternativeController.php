<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\AlternativeRequest;
use App\Http\Requests\Admin\AlternativeUpdateRequest;
use App\Models\Alternative;
use Illuminate\Http\Request;

class AlternativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatives = Alternative::get();
        return view('admin.pages.alternative.index', compact('alternatives'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.alternative.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlternativeRequest $request)
    {
        // Validate the request
        $validated = $request->validated();

        // Convert the 'nama' field to uppercase
        $validated['nama'] = strtoupper($validated['nama']);

        // Create the alternative record
        $alternative = Alternative::create($validated);

        if ($alternative) {
            return redirect()->route('admin.alternative.index')->with('success_message', 'Data alternative berhasil ditambahkan!');
        }
        return redirect()->back()->with('error_message', 'Data alternative gagal ditambahkan!');
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
        $alternative = Alternative::findOrFail($id);

        return view('admin.pages.alternative.edit', compact('alternative'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AlternativeUpdateRequest $request, $id)
    {
        // Validate the request
        $validated = $request->validated();

        // Convert the 'nama' field to uppercase
        if (isset($validated['nama'])) {
            $validated['nama'] = strtoupper($validated['nama']);
        }

        // Find the existing alternative by ID
        $alternative = Alternative::findOrFail($id);

        // Update the alternative record
        $kriteriaUpdated = $alternative->update($validated);

        if ($kriteriaUpdated) {
            return redirect()->route('admin.alternative.index')->with('success_message', 'Data alternative berhasil diubah!');
        }
        return redirect()->back()->with('error_message', 'Data alternative gagal diubah!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Hapus semua AlternativeValue berdasarkan alternative_id
        Alternative::where('id', $id)->delete();

        return redirect()->route('admin.alternative.index')
            ->with('success_message', 'Data  warga berhasil dihapus!');
    }
}
