<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pencarian;

class PencarianController extends Controller
{
    // Menampilkan halaman pencarian
    public function index()
    {
        $pencarian = Pencarian::all(); // Ambil semua data penginapan
        return view('pencarian.index', compact('pencarian'));
    }

    // Fitur pencarian berdasarkan nama atau lokasi
    public function search(Request $request)
{
    $query = $request->input('search'); // Data input pencarian
    $pencarian = Pencarian::where('name', 'LIKE', "%$query%")
        ->orWhere('description', 'LIKE', "%$query%") // Sesuaikan kolom dengan tabel
        ->get();

    return view('pencarian.index', compact('pencarian', 'query'));
}


    // Menampilkan detail penginapan
    public function show($id)
    {
        $pencarian = Pencarian::where('id', $id)->firstOrFail();
        return view('pencarian.show', compact('pencarian'));
    }
}
