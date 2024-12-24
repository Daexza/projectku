@extends('layout.home')

@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow-lg border-0 rounded-3" style="width: 100%; max-width: 600px;">
        <div class="card-header bg-primary text-white fw-bold text-center" style="font-size: 1.5rem;">
            Details Payment
        </div>
        <div class="card-body">
            <div class="mb-3">
                <p><strong>Accommodation:</strong> {{ $booking->pencarian->name }}</p>
                <p><strong>Room:</strong> {{ $booking->room->room_number }}</p>
                <p><strong>Room Type:</strong> {{ ucfirst($booking->room->room_type) }}</p>
            </div>

            <div class="mb-3">
                <p><strong>Name:</strong> {{ $booking->name }}</p>
                <p><strong>Email:</strong> {{ $booking->email }}</p>
            </div>

            <div class="mb-3">
                <p><strong>Check In:</strong> {{ $booking->check_in }}</p>
                <p><strong>Check Out:</strong> {{ $booking->check_out }}</p>
            </div>

            <div class="mb-3">
                <p><strong>Total Price:</strong>
                    <span style="color: #388e3c; font-weight: bold;">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</span>
                </p>
            </div>

            <hr>

            <!-- Tombol Pay -->
            <input type="hidden" id="booking-id" value="{{ $booking->id }}">
            <div class="text-center mt-3">
                <button id="pay-button" class="btn btn-success px-4 py-2" style="font-size: 1.1rem;">
                    Pay Now
                </button>
            </div>
        </div>
    </div>
</div>




<script>
    // Fungsi untuk mendapatkan Snap Token dari server
   function getSnapToken(bookingId) {
    fetch(`/booking/${bookingId}/get-snap-token`, { // Route yang sesuai
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}', // Tambahkan CSRF token
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.snap_token) {
            window.snap.pay(data.snap_token, {
                onSuccess: function(result) {
                    alert("Pembayaran berhasil!");
                    console.log(result);
                },
                onPending: function(result) {
                    alert("Menunggu pembayaran!");
                    console.log(result);
                },
                onError: function(result) {
                    alert("Pembayaran gagal!");
                    console.log(result);
                },
                onClose: function() {
                    alert('Anda menutup popup pembayaran.');
                }
            });
        } else {
            alert('Snap Token gagal didapatkan!');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat mengambil Snap Token!');
    });
}

    // Event listener untuk tombol 'Pay Now'
    document.getElementById('pay-button').addEventListener('click', function () {
        const bookingId = document.getElementById('booking-id').value; // Ambil ID booking dari elemen HTML
        getSnapToken(bookingId); // Panggil fungsi untuk mendapatkan Snap Token
    });
    </script>

  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

@endsection
