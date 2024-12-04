@extends('layout.home')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-5">
    <div class="text-center">
        <h1>{{ $welcomeMessage }}</h1>
        <p class="lead">Manage your bookings and explore more!</p>
    </div>

    <!-- Daftar Booking -->
    <div class="mt-4">
        <h2>Recent Bookings</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Accommodation Name</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Booking Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $booking->accommodation_name }}</td>
                    <td>{{ $booking->user_name }}</td>
                    <td>{{ $booking->email }}</td>
                    <td>{{ $booking->date }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No bookings yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Tombol untuk Aksi Tambahan -->
    <div class="text-center mt-5">
        <a href="{{ route('pencarian.index') }}" class="btn btn-primary">Explore Accommodations</a>
    </div>
</div>
@endsection
