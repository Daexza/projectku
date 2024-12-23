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
            <input type="hidden" id="booking-id" value="{{ $booking->id }}">
            <button id="pay-button" class="btn btn-success">Pay Now</button>
        </div>
    </div>
</div>

{{-- <script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay('{{ $snapToken }}', {
        onSuccess: function(result){
          /* You may add your own implementation here */
          alert("payment success!"); console.log(result);
        },
        onPending: function(result){
          /* You may add your own implementation here */
          alert("wating your payment!"); console.log(result);
        },
        onError: function(result){
          /* You may add your own implementation here */
          alert("payment failed!"); console.log(result);
        },
        onClose: function(){
          /* You may add your own implementation here */
          alert('you closed the popup without finishing the payment');
        }
      })
    });
  </script> --}}

<script>
    // Fungsi untuk mendapatkan Snap Token dari server
    function getSnapToken(bookingId) {
        fetch(`/booking/${bookingId}/get-snap-token`) // Gantilah URL dengan route yang sesuai
            .then(response => response.json()) // Mendapatkan respon dalam format JSON
            .then(data => {
                if (data.snap_token) {
                    // Tampilkan Snap Popup jika Snap Token berhasil didapatkan
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
