@extends('layout.home')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Booking Management</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Form Booking -->
    @if($room)
    <div class="card mb-4 shadow">
        <div class="card-header fw-bold">Add New Booking</div>
        <div class="card-body">
            <form method="POST" action="{{ route('booking.store') }}">
                @csrf
                <div class="row">
                    <!-- Accommodation -->
                    <div class="col-md-3 mb-3">
                        <label for="accommodation">Accommodation</label>
                        <input type="text" class="form-control" value="{{ $room->pencarian->name ?? '' }}" readonly>
                        <input type="hidden" name="pencarian_id" value="{{ $room->pencarian->id ?? '' }}">
                    </div>

                    <!-- Room -->
                    <div class="col-md-3 mb-3">
                        <label for="room">Room</label>
                        <input type="text" class="form-control" value="{{ $room->room_number ?? '' }}" readonly>
                        <input type="hidden" name="room_id" value="{{ $room->room_id ?? '' }}">
                    </div>

                    <!-- Room Type -->
                    <div class="col-md-3 mb-3">
                        <label for="room_type">Room Type</label>
                        <input type="text" class="form-control" value="{{ ucfirst($room->room_type ?? '') }}" readonly>
                    </div>

                    <!-- Name -->
                    <div class="col-md-3 mb-3">
                        <label for="name">Your Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <!-- Email -->
                    <div class="col-md-3 mb-3">
                        <label for="email">Your Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <!-- Check In Date -->
                    <div class="col-md-3 mb-3">
                        <label for="check_in">Check In</label>
                        <input type="date" name="check_in" class="form-control" required>
                    </div>

                    <!-- Check Out Date -->
                    <div class="col-md-3 mb-3">
                        <label for="check_out">Check Out</label>
                        <input type="date" name="check_out" class="form-control" required>
                    </div>

                    <!-- Total Price -->
                    <div class="col-md-3 mb-3">
                        <label for="total_price">Total Price</label>
                        <input type="text" class="form-control" value="Rp 0,00" readonly id="total_price">
                    </div>
                </div>


                <a href="{{ route('booking.show', $room->room_id) }}" class="btn btn-primary">Book Now</a>            </form>

                <button type="submit" class="btn btn-success">Book Now</button>
            </form>
            <a href="{{ route('booking.show', $room->room_id) }}" class="btn btn-primary">Book Now</a>



    @endif





    <!-- Booking List Table -->
<div class="card shadow">
    <div class="card-header fw-bold">Booking List</div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Accommodation</th>
                    <th>Room</th>
                    <th>Room Type</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Total Price</th>
                    <th>Payment Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bookings as $booking)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $booking->pencarian->name ?? '-' }}</td>
                        <td>{{ $booking->room->room_number ?? '-' }}</td>
                        <td>{{ ucfirst($booking->room->room_type ?? '-') }}</td>
                        <td>{{ $booking->name }}</td>
                        <td>{{ $booking->email }}</td>
                        <td>{{ $booking->check_in }}</td>
                        <td>{{ $booking->check_out }}</td>
                        <td>Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                        <td>{{ ucfirst($booking->payment_status) }}</td>
                        <td>
                            @if($booking->payment_status === 'pending')
                                <a href="{{ route('booking.show', $booking->id) }}" class="btn btn-success btn-sm">
                                    Pay Now
                                </a>
                            @else
                                <span class="text-muted">No Action</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11" class="text-center">No bookings found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>


<script>

    // Hitung total harga saat tanggal check_in atau check_out berubah
    document.querySelectorAll('[name="check_in"], [name="check_out"]').forEach(input => {
        input.addEventListener('change', () => {
            const checkIn = document.querySelector('[name="check_in"]').value;
            const checkOut = document.querySelector('[name="check_out"]').value;

            if (checkIn && checkOut) {
                const startDate = new Date(checkIn);
                const endDate = new Date(checkOut);
                const days = (endDate - startDate) / (1000 * 60 * 60 * 24);

                if (days > 0) {
                    const pricePerNight = {{ $room->price_per_night ?? 0 }};
                    const totalPrice = days * pricePerNight;

                    // Format harga ke dalam Rupiah
                    document.getElementById('total_price').value = `Rp ${new Intl.NumberFormat('id-ID').format(totalPrice)}`;
                } else {
                    document.getElementById('total_price').value = "Rp 0,00";
                }
            }
        });
    });
</script>

@endsection
