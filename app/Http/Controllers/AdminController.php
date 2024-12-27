<?php

namespace App\Http\Controllers;

use App\Models\Busana;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // DASHBOARD LOGIC
    public function dashboard()
    {
        $adminCount = User::count();
        $busanaCount = Busana::count();
        $salesCount = Order::count();

        // Menghitung stok yang terjual berdasarkan total_pesanan di tabel report
        $soldStock = Busana::join('reports', 'busanas.id', '=', 'reports.busana_id')
            ->sum('reports.total_pesanan');

        // Mengambil data stok busana
        $availableStock = Busana::select('nama_busana', 'stok')->get();

        // Menghitung total penjualan dari tabel order_details
        $salesRevenue = OrderDetail::sum('subtotal');

        return view('admins.dashboard', compact('adminCount', 'busanaCount', 'salesCount', 'soldStock', 'availableStock', 'salesRevenue'));
    }
    // END OF DASHBOARD LOGIC

    // PROFILE LOGIC
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
            'email' => 'required|email|unique:users,email,' . $admin_id,
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
    // END OF PROFILE LOGIC


    // LOGIN LOGOUT LOGIC
    public function index()
    {
        return view('admins.adlogin');
    }

    public function login_proses(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard')->with('success', 'Login Berhasil');
        }

        return back()
            ->withErrors(['email' => 'Email atau Password salah.'])
            ->with('failed', 'Email atau Password salah');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('success', "Berhasil Logout");
    }
    // END OF LOGIN LOGOUT LOGIC
}
