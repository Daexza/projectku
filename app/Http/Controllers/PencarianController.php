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
        $pencarian = Pencarian::where('name', 'LIKE', "%$query%")
            ->orWhere('description', 'LIKE', "%$query%")
            ->get();

        return view('pencarian.index', compact('pencarian', 'query'));
    }

    public function show($id)
    {
        $pencarian = Pencarian::where('id', $id)->firstOrFail();
        return view('pencarian.show', compact('pencarian'));
    }
}
