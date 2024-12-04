@extends('layout.home')

@section('content')
<div class="container mt-5">
    <div class="card">
        <img src="{{ asset('storage/' . $pencarian->image_url) }}" class="card-img-top" alt="{{ $pencarian->name }}">
        <div class="card-body">
            <h1 class="card-title">{{ $pencarian->name }}</h1>
            <p class="card-text">{{ $pencarian->description }}</p>
            <p><strong>Location:</strong> {{ $pencarian->location }}</p>
            <p><strong>Price:</strong> ${{ number_format($pencarian->price, 2) }}</p>
            <p><strong>Facilities:</strong> {{ $pencarian->facilities }}</p>
            <p><strong>Rating:</strong> {{ $pencarian->rating }}/5</p>
            <p><strong>Contact:</strong> {{ $pencarian->phone_number }}</p>

            <!-- Booking Form -->
            <h3 class="mt-4">Book this accommodation</h3>
            <form action="{{ route('booking.store') }}" method="POST">
                @csrf
                <input type="hidden" name="accommodation_id" value="{{ $pencarian->id }}">
                <div class="mb-3">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Your Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Booking Date</label>
                    <input type="date" name="date" id="date" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Book Now</button>
            </form>
        </div>
    </div>
</div>
@endsection
