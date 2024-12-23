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

    // Set konfigurasi Midtrans
    \Midtrans\Config::$serverKey = 'SB-Mid-server-zAFSrS-J3B4NOlsP38YFHKpN'; // Gunakan Server Key Anda
    \Midtrans\Config::$isProduction = false; // Mode Sandbox
    \Midtrans\Config::$isSanitized = true;
    \Midtrans\Config::$is3ds = true;

    // Parameter Snap
    $params = [
        'transaction_details' => [
            'order_id' => 'ORDER-' . $booking->id,
            'gross_amount' => $booking->total_price, // Total price from booking
        ],
        'customer_details' => [
            'name' => $booking->name,
            'email' => $booking->email,
        ],
        'item_details' => [
            [
                'id' => $booking->room->room_id,
                'price' => $booking->room->price_per_night,
                'quantity' => 1,
                'name' => $booking->room->room_type,
            ]
        ]
    ];

try {
        // Dapatkan Snap Token dari Midtrans
        $snapToken = \Midtrans\Snap::getSnapToken($params); // Menghasilkan Snap Token
        return response()->json(['snap_token' => $snapToken]);
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



    public function handleNotification(Request $request)
    {
        \Midtrans\Config::$serverKey = config('services.midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $notification = new Notification();

        $transactionStatus = $notification->transaction_status;
        $orderId = $notification->order_id;

        // Ambil ID Booking dari order_id
        $bookingId = str_replace('ORDER-', '', $orderId);
        $booking = Booking::find($bookingId);

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        // Perbarui status pembayaran berdasarkan status dari Midtrans
        if (in_array($transactionStatus, ['capture', 'settlement'])) {
            $booking->payment_status = 'success';
        } elseif ($transactionStatus === 'pending') {
            $booking->payment_status = 'pending';
        } elseif (in_array($transactionStatus, ['deny', 'expire', 'cancel'])) {
            $booking->payment_status = 'failed';
        }

        $booking->save();

        return response()->json(['message' => 'Notification processed']);
    }
}


