<?php

namespace App\Http\Controllers;

use App\Models\Busana;
use Illuminate\Http\Request;

class BusanaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Mengambil data barang dengan pencarian
        $busana = Busana::when($search, function ($query, $search) {
            return $query->where('nama_busana', 'like', "%{$search}%")
                ->orWhere('harga', 'like', "%{$search}%");
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
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
