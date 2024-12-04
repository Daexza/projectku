<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data yang dikirim
        $validated = $request->validate([
            'accommodation_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date' => 'required|date',
        ]);

        // Simpan data booking ke database
        Booking::create([
            'accommodation_id' => $validated['accommodation_id'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'date' => $validated['date'],
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Booking berhasil dilakukan!');
    }

    public function destroy($id)
    {
        // Hapus booking berdasarkan ID
        Booking::destroy($id);

        // Redirect dengan pesan sukses
        return redirect()->route('dashboard.index')->with('success', 'Booking berhasil dihapus!');
    }

    public function index()
    {
        // Ambil daftar booking dengan informasi nama akomodasi
        $bookings = Booking::with('accommodation')->get();

        return view('dashboard.index', compact('bookings'));
    }
}
