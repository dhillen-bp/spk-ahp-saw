<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\DataAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Admin::paginate(10);
        return view('admin.pages.admin.index', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DataAdminRequest $request)
    {
        $validated = $request->validated();

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $admin = Admin::create($validated);

        if ($admin) {
            return redirect()->route('admin.data_admin.index')->with('success_message', 'Data admin berhasil ditambahkan!');
        }
        return redirect()->back()->with('error_message', 'Data admin gagal ditambahkan!');
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
        $admin = Admin::findOrFail($id);

        return view('admin.pages.admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validated = $request->validate([
            'nama' => 'string',
            'username' => 'string',
            'role' => 'in:rt_rw,pemerintah_desa',
            'password' => 'nullable|string',
            'desc' => 'string',
        ]);

        $admin = Admin::findOrFail($id);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $kriteriaUpdated = $admin->update($validated);

        if ($kriteriaUpdated) {
            return redirect()->route('admin.data_admin.index')->with('success_message', 'Data admin berhasil diubah!');
        }
        return redirect()->back()->with('error_message', 'Data admin gagal diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.data_admin.index')->with('success_message', 'Data admin berhasil dihapus!');
    }
}
