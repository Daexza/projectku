<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Tampilkan daftar booking.
     */
    public function index()
    {
        // Ambil data booking dengan relasi ke accommodation
        $bookings = Booking::with('accommodation')->get();

        // Tampilkan halaman daftar booking
        return view('booking.index', compact('bookings'));
    }

    /**
     * Simpan data booking baru.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'accommodation_id' => 'required|integer|exists:pencarian,id', // Validasi ke tabel 'pencarian'
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date' => 'required|date|after_or_equal:today',
        ]);
        

        // Simpan data booking
        Booking::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('booking.index')->with('success', 'Booking berhasil dilakukan!');
    }

    /**
     * Hapus data booking.
     */
    public function destroy($id)
    {
        // Cari booking berdasarkan ID atau gagal
        $booking = Booking::findOrFail($id);

        // Hapus booking
        $booking->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('booking.index')->with('success', 'Booking berhasil dihapus!');
    }
}
