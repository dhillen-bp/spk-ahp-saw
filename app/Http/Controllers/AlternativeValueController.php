<?php

namespace App\Http\Controllers;

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
        $alternativeValues = AlternativeValue::paginate(10);
        $criterias = Criteria::all();
        return view('admin.pages.alternative.penilaian.index', compact('alternativeValues', 'criterias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $criterias = Criteria::with('subCriteria')->get();
        $alternatives = Alternative::all();
        return view('admin.pages.alternative.penilaian.create', compact('criterias', 'alternatives'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validated();

        $alternative = AlternativeValue::create($validated);

        if ($alternative) {
            return redirect()->route('admin.alternative.penilaian.index')->with('success_message', 'Data nilai alternative berhasil ditambahkan!');
        }
        return redirect()->back()->with('error_message', 'Data nilai alternative gagal ditambahkan!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
