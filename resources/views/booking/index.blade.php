@extends('layout.home')

@section('content')
<div class="container mt-5">
    <h1>Daftar Booking</h1>

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
                    <div class="col-md-3 mb-3">
                        <label for="accommodation_id">Accommodation</label>
                        <select name="accommodation_id" class="form-control" required>
                            <option value="">-- Select Accommodation --</option>
                            @foreach($accommodations as $accommodation)
                                <option value="{{ $accommodation->id }}"
                                    {{ isset($room) && $room->pencarian->id == $accommodation->id ? 'selected' : '' }}>
                                    {{ $accommodation->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
            
                    <div class="col-md-3 mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="date">Booking Date</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
            
                    @if(isset($room))
                        <input type="hidden" name="room_id" value="{{ $room->room_id }}">
                        <div class="col-md-3 mb-3">
                            <label>Room</label>
                            <input type="text" class="form-control" value="{{ $room->room_number }} - {{ ucfirst($room->room_type) }}" disabled>
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-success">Add Booking</button>
            </form>
            
        </div>
    </div>

    <!-- Table Booking List -->
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Accommodation</th>
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
                    <td colspan="6" class="text-center">No bookings found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
