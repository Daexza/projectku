<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pencarian;

class PencarianController extends Controller
{
    public function index()
    {
        $pencarian = Pencarian::all();
        return view('pencarian.index', compact('pencarian'));
    }

    public function search(Request $request)
    {
        $query = $request->input('search');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Query pencarian
        $pencarian = Pencarian::query();

        // Filter nama atau deskripsi
        if ($query) {
            $pencarian->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', "%$query%")
                  ->orWhere('description', 'LIKE', "%$query%");
            });
        }

        // Filter berdasarkan tanggal
        if ($startDate && $endDate) {
            $pencarian->where('available_from', '<=', $startDate)
                      ->where('available_to', '>=', $endDate);
        }

        // Eksekusi query
        $pencarian = $pencarian->get();

        return view('pencarian.index', compact('pencarian', 'query', 'startDate', 'endDate'));
    }

    public function show($id)
    {
        $pencarian = Pencarian::where('id', $id)->firstOrFail();
        return view('pencarian.show', compact('pencarian'));
    }
}
