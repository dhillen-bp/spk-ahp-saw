<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\AlternativeRequest;
use App\Models\Alternative;
use Illuminate\Http\Request;

class AlternativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatives = Alternative::paginate(10);
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
        $validated = $request->validated();

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
    public function update(AlternativeRequest $request,  $id)
    {
        $validated = $request->validated();

        $alternative = Alternative::findOrFail($id);

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
        //
    }
}
