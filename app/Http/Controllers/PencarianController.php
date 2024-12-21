<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pencarian;
use Illuminate\Support\Facades\DB; // Tambahkan ini

class PencarianController extends Controller
{
    public function index()
    {
        // Ambil data pencarian dengan harga kamar terendah
        $pencarian = Pencarian::select('pencarian.*')
            ->addSelect(DB::raw('(SELECT MIN(price_per_night) FROM rooms WHERE rooms.pencarian_id = pencarian.id) as min_price'))
            ->get();

        return view('pencarian.index', compact('pencarian'));
    }

    public function search(Request $request)
    {
        $query = $request->input('search');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Query pencarian dengan harga kamar terendah
        $pencarian = Pencarian::select('pencarian.*')
            ->addSelect(DB::raw('(SELECT MIN(price_per_night) FROM rooms WHERE rooms.pencarian_id = pencarian.id) as min_price'))
            ->when($query, function ($q) use ($query) {
                $q->where('name', 'LIKE', "%$query%")
                  ->orWhere('description', 'LIKE', "%$query%");
            })
            ->when($startDate && $endDate, function ($q) use ($startDate, $endDate) {
                $q->where('available_from', '<=', $startDate)
                  ->where('available_to', '>=', $endDate);
            })
            ->get();

        return view('pencarian.index', compact('pencarian', 'query', 'startDate', 'endDate'));
    }
    public function show($id)
{
    $pencarian = Pencarian::with('rooms')->findOrFail($id);

    // Ambil harga kamar terendah
    $minPrice = $pencarian->rooms()->min('price_per_night');

    return view('pencarian.show', compact('pencarian', 'minPrice'));
}



public function showRoom($id)
{
    $pencarian = Pencarian::with(['rooms' => function ($query) {
        $query->whereDoesntHave('bookings')
              ->orderBy('price_per_night', 'asc'); // Sorting by price
    }])->findOrFail($id);

    $rooms = $pencarian->rooms;

    return view('pencarian.room', compact('pencarian', 'rooms'));
}

public function updateRoomPrices()
{
    // Update kolom price_per_night yang NULL atau 0 menjadi 100000
    $updated = DB::table('rooms')
        ->whereNull('price_per_night')
        ->orWhere('price_per_night', '=', 0)
        ->update(['price_per_night' => 100000]);

    if ($updated) {
        return response()->json(['message' => "{$updated} records updated successfully."]);
    }

    return response()->json(['message' => "No records need to be updated."]);
}


}
