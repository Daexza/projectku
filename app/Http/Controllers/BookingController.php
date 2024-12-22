<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Tampilkan daftar booking.
     */
    public function index(Request $request)
    {
        // Ambil semua data booking dengan relasi pencarian dan room
        $bookings = Booking::with(['pencarian', 'room'])->get();

        // Ambil semua data dari tabel 'pencarian'
        $pencarian = DB::table('pencarian')->get();

        // Ambil room_id jika tersedia di query string
        $room = null;
        if ($request->has('room_id')) {
            $room = Room::with('pencarian')->where('room_id', $request->room_id)->first();
        }

        return view('booking.index', compact('bookings', 'pencarian', 'room'));
    }

    /**
     * Simpan data booking baru.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'pencarian_id' => 'required|integer|exists:pencarian,id',
            'room_id' => 'required|integer|exists:rooms,room_id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
                'check_in' => 'required|date|after_or_equal:today',
                'check_out' => 'required|date|after:check_in',
            ]);
            
        
    
        // Hitung jumlah hari untuk booking
        $startDate = \Carbon\Carbon::parse($validated['check_in']);
        $endDate = \Carbon\Carbon::parse($validated['check_out']);
        $days = $endDate->diffInDays($startDate);
    
        // Ambil harga kamar
        $room = \App\Models\Room::findOrFail($validated['room_id']);
        $totalPrice = $days * $room->price_per_night;
    
        // Simpan data booking
        Booking::create([
            'pencarian_id' => $validated['pencarian_id'],
            'room_id' => $validated['room_id'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
            'total_price' => $totalPrice,
        ]);
    
        // Redirect ke halaman booking dengan pesan sukses
        return redirect()->route('booking.index')->with('success', 'Booking berhasil dilakukan!');
    }
    

    // admin booking list
    public function userList()
    {
        // Ambil semua booking dengan relasi pengguna
        $bookings = Booking::with('pencarian')->get();
    
        // Ambil daftar pengguna yang telah melakukan booking
        $users = $bookings->unique('email')->values();
    
        return view('admin.booking.user_list', compact('users', 'bookings'));
    }

// detail booking
public function show($id)
    {
        // Cari booking berdasarkan ID
        $booking = Booking::with(['pencarian', 'room'])->find($id);

        // Jika booking tidak ditemukan, redirect atau tampilkan pesan error
        if (!$booking) {
            return redirect()->route('admin.booking.user_list')->with('error', 'Booking tidak ditemukan.');
        }

        return view('admin.booking.show', compact('booking'));
    }



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
