<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admins.dashboard');
    }

    public function editProfile()
    {
        $admin = Auth::user(); // Ambil admin yang sedang login
        return view('admins.profile', compact('admin'));
    }

    public function show($admin_id)
    {
        $admin = User::findOrFail($admin_id); // Menangani ID yang tidak ditemukan
        return view('admins.profile', compact('admin'));
    }

    public function updateProfile(Request $request, $admin_id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $admin_id, // Pastikan email unik kecuali untuk admin ini
            'password' => 'nullable|string|confirmed',
        ]);

        // Siapkan data untuk update
        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        // Tambahkan password jika diisi
        if ($request->password) {
            $updateData['password'] = bcrypt($request->password);
        }

        // Gunakan Query Builder untuk mengupdate data
        DB::table('users')->where('id', $admin_id)->update($updateData);

        // Redirect dengan pesan sukses
        return redirect()->route('admins.profile')->with('success', 'Data berhasil diubah!');
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
