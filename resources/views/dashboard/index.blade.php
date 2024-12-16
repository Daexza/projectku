@extends('layout.home')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid p-0">
    <!-- Background Section -->
    <div class="bg-image text-white text-center" style="background-image: url('https://i.pinimg.com/736x/9d/03/5e/9d035e65b4246822c324b6c9d1c3e741.jpg'); background-size: cover; background-position: center; height: 100vh;">
        <div class="overlay" style="background-color: rgba(0, 0, 0, 0.3); height: 100%; position: relative;">
            <!-- Logo Section -->
            <div class="s~earch-banner position-absolute top-0 start-0 m-3">
                <div class="logo" style="font-size: 1.5rem; font-weight: bold;">
                    <span style="color: #ffffff;">BE</span><span style="color: #7166f9;">explore</span>
                </div>
            </div>
            <!-- Main Content -->
            <div class="d-flex flex-column justify-content-center align-items-center text-center" style="height: 100%; padding: 0 15px;">
                <h1 class="display-4 fw-bold text-white" style="line-height: 1.5; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);">
                    Explore Attractions, <br> Find Perfect Stays with BExplore!
                </h1>
                <div class="mt-4">
                    <a href="{{ route('pencarian.index') }}" class="btn btn-primary px-4 py-2 mx-2">BExplore Accommodations</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="container mt-5">
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
</div>
@endsection
