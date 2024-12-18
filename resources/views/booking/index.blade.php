@extends('layout.home')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Booking Management</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Form Booking -->
    <div class="card mb-4">
        <div class="card-header">Add New Booking</div>
        <div class="card-body">
            <form action="{{ route('booking.store') }}" method="POST">
                @csrf
                <div class="row">
                    <!-- Accommodation -->
                    <div class="col-md-3 mb-3">
                        <label>Accommodation</label>
                        <input type="text" class="form-control" value="{{ $room->pencarian->name ?? '' }}" readonly>
                        <input type="hidden" name="accommodation_id" value="{{ $room->pencarian->id ?? '' }}">
                    </div>
<<<<<<< HEAD
            
                    <!-- Room -->
=======

>>>>>>> 982d1358759533743810d4815f89d6dc40cc233b
                    <div class="col-md-3 mb-3">
                        <label>Room</label>
                        <input type="text" class="form-control" value="{{ $room->room_number ?? '' }}" readonly>
                        <input type="hidden" name="room_id" value="{{ $room->room_id ?? '' }}">
                    </div>
            
                    <!-- Room Type -->
                    <div class="col-md-3 mb-3">
                        <label>Room Type</label>
                        <input type="text" class="form-control" value="{{ ucfirst($room->room_type ?? '') }}" readonly>
                    </div>
            
                    <!-- Booking Name -->
                    <div class="col-md-3 mb-3">
                        <label>Your Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                </div>
            
                <div class="row">
                    <!-- Email -->
                    <div class="col-md-3 mb-3">
                        <label>Your Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
            
                    <!-- Booking Date -->
                    <div class="col-md-3 mb-3">
                        <label>Booking Date</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
<<<<<<< HEAD
=======

                    @if(isset($room))
                        <input type="hidden" name="room_id" value="{{ $room->room_id }}">
                        <div class="col-md-3 mb-3">
                            <label>Room</label>
                            <input type="text" class="form-control" value="{{ $room->room_number }} - {{ ucfirst($room->room_type) }}" disabled>
                        </div>
                    @endif
>>>>>>> 982d1358759533743810d4815f89d6dc40cc233b
                </div>
            
                <button type="submit" class="btn btn-success">Book Now</button>
            </form>

        </div>
    </div>

    <!-- Table Booking List -->
    <div class="card">
        <div class="card-header">Booking List</div>
        <div class="card-body">
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Accommodation</th>
                        <th>Room</th>
                        <th>Room Type</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Booking Date</th>
                        <th>Actions</th>
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
                            <td>
                                <form action="{{ route('booking.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No bookings found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
        </div>
    </div>
</div>
@endsection
