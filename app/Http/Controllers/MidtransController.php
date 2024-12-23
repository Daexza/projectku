<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function handleNotification(Request $request)
{
    // Konfigurasi Midtrans
    \Midtrans\Config::$serverKey = config('midtrans.server_key');
    \Midtrans\Config::$isProduction = false;
    \Midtrans\Config::$isSanitized = true;
    \Midtrans\Config::$is3ds = true;

    // Ambil notifikasi dari Midtrans
    $notification = new \Midtrans\Notification();

    $transaction = $notification->transaction_status;
    $orderId = $notification->order_id;

    // Extract booking ID dari order_id
    $bookingId = str_replace('ORDER-', '', $orderId);

    // Cari data booking
    $booking = Booking::find($bookingId);

    if (!$booking) {
        return response()->json(['message' => 'Booking not found'], 404);
    }

    // Perbarui status pembayaran berdasarkan notifikasi
    if ($transaction == 'settlement') {
        $booking->payment_status = 'success';
    } elseif ($transaction == 'pending') {
        $booking->payment_status = 'pending';
    } elseif (in_array($transaction, ['deny', 'expire', 'cancel'])) {
        $booking->payment_status = 'failed';
    }

    $booking->save();

    return response()->json(['message' => 'Payment status updated'], 200);
}
}