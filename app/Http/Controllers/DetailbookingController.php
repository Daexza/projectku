<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class DetailbookingController extends Controller
{
    // Admin booking list
    public function userList()
    {
        // Ambil semua booking dengan relasi pengguna
        $bookings = Booking::with('pencarian')->get();
    
        // Ambil daftar pengguna yang telah melakukan booking
        $users = $bookings->unique('email')->values();
    
        return view('admin.booking.user_list', compact('users', 'bookings'));
    }

    // Detail booking
    public function detail($id)
    {
        // Cari booking berdasarkan ID
        $booking = Booking::with(['pencarian', 'room'])->find($id);

        // Jika booking tidak ditemukan, redirect atau tampilkan pesan error
        if (!$booking) {
            return redirect()->route('admin.booking.user_list')->with('error', 'Booking tidak ditemukan.');
        }

        return view('admin.booking.detail', compact('booking'));
    }

    // Hapus booking
    public function destroy($id)
    {
        try {
            // Cari booking yang akan dihapus
            $booking = Booking::findOrFail($id);
            
            // Hapus booking
            $booking->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('admin.booking.user_list')
                ->with('success', 'Booking berhasil dihapus.');
        } catch (\Exception $e) {
            // Tangani error jika gagal menghapus
            return redirect()->route('admin.booking.user_list')
                ->with('error', 'Gagal menghapus booking: ' . $e->getMessage());
        }
    }
}