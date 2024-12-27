<?php

namespace App\Http\Controllers;

use App\Models\Busana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BusanaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Mengambil data barang dengan pencarian
        $busana = Busana::when($search, function ($query, $search) {
            return $query->where('nama_busana', 'like', "%{$search}%")
                ->orWhere('harga', 'like', "%{$search}%")
                ->orWhere('deskripsi', 'like', "%{$search}%");
        })->paginate(10);

        // Mengirimkan data barang ke view
        return view('busanas.index', compact('busana'));
    }

    public function create()
    {
        return view('busanas.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nama_busana" => "required|string|max:255",
            "harga" => "required|numeric",
            "deskripsi" => "nullable|string|max:255",
            "gambar" => "nullable|image|mimes:jpg,jpeg,png|max:2048",
        ]);

        if ($request->hasFile('gambar')) {
            $filePath = $request->file('gambar')->store('gambar', 'public');
            $validatedData['gambar'] = $filePath;
        }

        $validatedData['stok'] = 0;

        Busana::create($validatedData);

        return redirect()->route("busana.index")->with('created', 'Data berhasil ditambahkan!');
    }

    public function show($id)
    {
        //
    }

    public function edit($busana_id)
    {
        $busana = Busana::findOrFail($busana_id);

        return view('busanas.edit', compact('busana'));
    }

    public function update(Request $request, $busana_id)
    {
        $validatedData = $request->validate([
            "nama_busana" => "required|string|max:255",
            "harga" => "required|numeric",
            "stok" => "required|numeric",
            "deskripsi" => "nullable|string|max:255",
            "gambar" => "nullable|image|mimes:jpg,jpeg,png|max:2048",
        ]);

        $busana = Busana::findOrFail($busana_id);

        // Jika ada file gambar baru diunggah
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($busana->gambar && Storage::exists('public/' . $busana->gambar)) {
                Storage::delete('public/' . $busana->gambar);
            }

            // Simpan gambar baru
            $filePath = $request->file('gambar')->store('gambar', 'public');
            $validatedData['gambar'] = $filePath;
        } else {
            // Jika tidak ada gambar baru, tetap gunakan gambar lama
            $validatedData['gambar'] = $busana->gambar;
        }

        // Jika deskripsi tidak diberikan, gunakan nilai lama
        $validatedData['deskripsi'] = $validatedData['deskripsi'] ?? $busana->deskripsi;

        // Update data busana
        $busana->update($validatedData);

        return redirect()->route('busana.index')->with('updated', 'Data berhasil diubah!');
    }



    public function destroy($busana_id)
    {
        $busana = Busana::where('id', $busana_id)->delete();

        return redirect()->route('busana.index')->with('deleted', 'Data Berhasil Dihapus!');
    }
}
