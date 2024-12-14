<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'accommodation_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date' => 'required|date',
        ]);

        Booking::create($validated);

        return redirect()->back()->with('success', 'Booking berhasil dilakukan!');
    }

    public function destroy($id)
    {
        Booking::destroy($id);
        return redirect()->route('dashboard.index')->with('success', 'Booking berhasil dihapus!');
    }

    public function index()
    {
        $bookings = Booking::with('accommodation')->get();
        return view('dashboard.index', compact('bookings'));
    }
}
