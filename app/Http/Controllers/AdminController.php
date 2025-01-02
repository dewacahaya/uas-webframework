<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // public function loginForm()
    // {
    //     return view('admin.login');
    // }

    // public function loginProcess(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         return redirect()->route('admin.dashboard');
    //     }

    //     return back()->with('error', 'Invalid email or password');
    // }

    // public function logout()
    // {
    //     Auth::logout();

    //     return redirect()->route('admin.login');
    // }

    public function dashboard()
    {
        return view('admins.dashboard');
    }

    public function index()
    {
        return view('admins.adlogin');
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Validasi kredensial
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        }

        // Jika gagal login
        return back()->withErrors(['email' => 'Email atau Password salah.'])->with('failed', "Email atau Password salah");
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', "Berhasil Logout");
    }
}
