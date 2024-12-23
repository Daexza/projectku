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

// public function pay($id) 
// {
//     $booking = Booking::findOrFail($id);

//     // Konfigurasi Midtrans
//     Config::$serverKey = config('midtrans.server_key');
//     Config::$isProduction = false;
//     Config::$isSanitized = true;
//     Config::$is3ds = true;

//     // Parameter Snap
//     $params = [
//         'transaction_details' => [
//             'order_id' => 'BOOK-' . $booking->id,
//             'gross_amount' => $booking->total_price,
//         ],
//         'customer_details' => [
//             'name' => $booking->name,
//             'email' => $booking->email,
//         ],
//     ];

//     $snapToken = Snap::getSnapToken($params);
//     return response()->json(['snap_token' => $snapToken]);
// }

// public function notificationHandler(Request $request)
// {
//     $notif = new Notification();

//     $transaction = $notif->transaction_status;
//     $orderId = $notif->order_id;

//     $bookingId = explode('-', $orderId)[1];
//     $booking = Booking::find($bookingId);

//     if ($transaction == 'settlement') {
//         $booking->update(['payment_status' => 'paid']);
//     } elseif ($transaction == 'pending') {
//         $booking->update(['payment_status' => 'pending']);
//     } elseif ($transaction == 'deny' || $transaction == 'cancel' || $transaction == 'expire') {
//         $booking->update(['payment_status' => 'failed']);
//     }

//     return response()->json(['status' => 'success']);
// }


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
