<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Tampilkan daftar booking.
     */
    public function index(Request $request)
    {
        // Ambil semua data booking
        $bookings = Booking::with(['accommodation', 'room'])->get();

        // Ambil semua data dari tabel 'pencarian'
        $accommodations = DB::table('pencarian')->get();

        // Ambil room_id jika tersedia di query string
        $room = null;
        if ($request->has('room_id')) {
            $room = \App\Models\Room::with('pencarian')->find($request->room_id);
        }

        return view('booking.index', compact('bookings', 'accommodations', 'room'));
    }



    /**
     * Simpan data booking baru.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'accommodation_id' => 'required|integer|exists:pencarian,id',
            'room_id' => 'required|integer|exists:rooms,room_id',
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
