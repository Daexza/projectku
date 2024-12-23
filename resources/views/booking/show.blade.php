@extends('layout.home')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Detail Booking</h1>

    <div class="card shadow">
        <div class="card-header fw-bold">Booking Details</div>
        <div class="card-body">
            <p><strong>Accommodation:</strong> {{ $booking->pencarian->name }}</p>
            <p><strong>Room:</strong> {{ $booking->room->room_number }}</p>
            <p><strong>Room Type:</strong> {{ ucfirst($booking->room->room_type) }}</p>
            <p><strong>Name:</strong> {{ $booking->name }}</p>
            <p><strong>Email:</strong> {{ $booking->email }}</p>
            <p><strong>Check In:</strong> {{ $booking->check_in }}</p>
            <p><strong>Check Out:</strong> {{ $booking->check_out }}</p>
            <p><strong>Total Price:</strong> Rp {{ number_format($booking->total_price, 0, ',', '.') }}</p>

            <!-- Tombol Pay -->
            <button id="pay-button" class="btn btn-success">Pay Now</button>
        </div>
    </div>
</div>

<!-- Midtrans Snap.js -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
    document.getElementById('pay-button').addEventListener('click', function () {
        // Kirim permintaan ke server untuk mendapatkan Snap Token
        fetch('{{ route('booking.pay', $booking->id) }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.snap_token) {
                // Jika Snap Token berhasil, tampilkan Snap Popup
                window.snap.pay(data.snap_token, {
                    onSuccess: function(result) {
                        alert('Pembayaran berhasil!');
                        location.reload();
                    },
                    onPending: function(result) {
                        alert('Menunggu pembayaran.');
                    },
                    onError: function(result) {
                        alert('Pembayaran gagal.');
                    }
                });
            } else {
                alert('Gagal mendapatkan Snap Token!');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat memproses pembayaran.');
        });
    });
</script>
@endsection
