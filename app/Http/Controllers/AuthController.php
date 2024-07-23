<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.pages.auth.login');
    }

    public function loginAction(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // Cek apakah username terdaftar
        $admin = Admin::where('username', $request->username)->first();

        if (!$admin) {
            return redirect()->back()->with('error_message', 'Username tidak terdaftar!');
        }

        // cek apakah login valid
        if (Auth::guard('admin')->attempt($credentials)) {

            // generate session
            $request->session()->regenerate();

            if (Auth::guard('admin')->user()) {
                return redirect()->route('admin.index')->with('success_message', "Anda berhasil login!");
            }

            // return redirect()->intended('dashboard');
        } else {
            return redirect()->back()->with('error_message', "Login gagal!" . "<br>" . "Username / Password Salah!");
        }
    }

    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success_message', "Logout Berhasil!");
    }
}
