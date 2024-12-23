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

            <button id="pay-button" class="btn btn-success">Pay Now</button>
        </div>
    </div>
</div>
  {{-- <script>
                document.getElementById('pay-button').addEventListener('click', function () {
                    // Kirim data form ke server
                    fetch('{{ route('booking.store') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            pencarian_id: document.querySelector('[name="pencarian_id"]').value,
                            room_id: document.querySelector('[name="room_id"]').value,
                            name: document.querySelector('[name="name"]').value,
                            email: document.querySelector('[name="email"]').value,
                            check_in: document.querySelector('[name="check_in"]').value,
                            check_out: document.querySelector('[name="check_out"]').value,
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Tampilkan Snap Popup
                        window.snap.pay(data.snap_token, {
                            onSuccess: function(result) {
                                alert('Payment successful!');
                                location.reload();
                            },
                            onPending: function(result) {
                                alert('Payment pending.');
                            },
                            onError: function(result) {
                                alert('Payment failed.');
                            }
                        });
                    });
                });
            </script> --}}

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
    document.getElementById('pay-button').addEventListener('click', function () {
        fetch('{{ route('booking.pay', $booking->id) }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        })
        .then(response => response.json())
        .then(data => {
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
        });
    });
</script>
@endsection
