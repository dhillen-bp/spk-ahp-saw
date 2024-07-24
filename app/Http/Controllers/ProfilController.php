<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin =  Auth::guard('admin')->user();
        return view('admin.pages.profil.index', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = Auth::guard('admin')->user()->id;

        $validated = $request->validate([
            'nama' => 'string',
            'username' => 'string',
            'role' => 'in:rt_rw,pemerintah_desa',
            'password' => 'nullable|string',
            'desc' => 'string',
        ]);

        $admin = Admin::findOrFail($id);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']); // Enkripsi password
        } else {
            // Hapus password dari data yang divalidasi jika tidak ada perubahan
            unset($validated['password']);
        }

        $adminUpdated = $admin->update($validated);

        if ($adminUpdated) {
            return redirect()->route('admin.profil.index')->with('success_message', 'Profil pengguna berhasil diperbarui!');
        }
        return redirect()->back()->with('error_message', 'Profil pengguna gagal diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
