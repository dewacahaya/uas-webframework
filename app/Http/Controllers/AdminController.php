<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
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

        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            session()->flash('success', 'Berhasil login!');
            return redirect()->route('dashboard');
        }

        return back()
            ->withErrors(['email' => 'Email atau Password salah.'])
            ->with('failed', 'Email atau Password salah');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', "Berhasil Logout");
    }
}
