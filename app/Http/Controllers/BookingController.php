<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;



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
        $booking = Booking::create([
            'pencarian_id' => $validated['pencarian_id'],
            'room_id' => $validated['room_id'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
            'total_price' => $totalPrice,
        ]);

        // Redirect ke halaman booking dengan pesan sukses
        return view('booking.show', compact('booking'));

    }

    public function show($id)
{
    $booking = Booking::with(['pencarian', 'room'])->findOrFail($id);
    return view('booking.show', compact('booking'));
}

public function getSnapToken($id)
{
    $booking = Booking::findOrFail($id); // Pastikan Anda memiliki model Booking
    $snapToken = $this->getSnapToken($booking); // Assuming you have a method to get the snap token

    // Set Midtrans Configuration
    /*Install Midtrans PHP Library (https://github.com/Midtrans/midtrans-php)
composer require midtrans/midtrans-php

Alternatively, if you are not using **Composer**, you can download midtrans-php library
(https://github.com/Midtrans/midtrans-php/archive/master.zip), and then require
the file manually.

require_once dirname(__FILE__) . '/pathofproject/Midtrans.php'; */
require_once dirname(__FILE__) . '/midtrans-php-master/Midtrans.php';


//SAMPLE REQUEST START HERE

// Set your Merchant Server Key
\Midtrans\Config::$serverKey = 'SB-Mid-server-zAFSrS-J3B4NOlsP38YFHKpN';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;



    $params = [
        'transaction_details' => [
            'order_id' => $booking->id,
            'gross_amount' => $booking->total_price, // Total price from booking
        ],
        'customer_details' => [
            'name' => $booking->name,
            'email' => $booking->email,

        ],

        'item_details' => [
            'id' => $booking -> room -> id,
            'price per night' => $booking->room->price_per_night,
            'check in' =>  $booking->check_in, // tanggal check in
            'check out' => $booking->check_out,
            'Total Price' => $booking -> total_price,
        ]
    ];

try {
        // Dapatkan Snap Token dari Midtrans
        $snapToken = \Midtrans\Snap::getSnapToken($params); // Menghasilkan Snap Token
    } catch (\Exception $e) {
        // Tangani error jika terjadi masalah saat mendapatkan Snap Token
        return response()->json(['error' => $e->getMessage()], 500);
    }

    // Kirim data snapToken dalam format JSON
    return response()->json(['snap_token' => $snapToken]);
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
