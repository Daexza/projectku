@extends('layout.home')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Booking Management</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Form Booking -->
    <div class="container mt-5">
        <h1 class="text-center mb-4">Booking Management</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

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
                            <input type="hidden" name="accommodation_id" value="{{ $room->pencarian->id ?? '' }}">
                        </div>

                        <!-- Room -->
                        <div class="col-md-3 mb-3">
                            <label for="room">Room</label>
                            <input type="text" class="form-control" value="{{ $room->room_number ?? '' }}" readonly>
                            <input type="hidden" name="room_id" value="{{ $room->id ?? '' }}">
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

                        <!-- Booking Date -->
                        <div class="col-md-3 mb-3">
                            <label for="start_date">Start Date</label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="end_date">End Date</label>
                            <input type="date" name="end_date" class="form-control" required>
                        </div>

                        <!-- Total Price -->
                        <div class="col-md-3 mb-3">
                            <label for="total_price">Total Price</label>
                            <input type="text" class="form-control" value="Rp {{ $room && request('start_date') && request('end_date') ? number_format($room->calculateTotalPrice(request('start_date'), request('end_date')), 2, ',', '.') : '0,00' }}" readonly>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Book Now</button>
                </form>
            </div>
        </div>
    </div>


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
                        <th>Booking Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bookings as $booking)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $booking->accommodation->name ?? '-' }}</td>
                            <td>{{ $booking->room->room_number ?? '-' }}</td>
                            <td>{{ ucfirst($booking->room->room_type ?? '-') }}</td>
                            <td>{{ $booking->name }}</td>
                            <td>{{ $booking->email }}</td>
                            <td>{{ $booking->date }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No bookings found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
