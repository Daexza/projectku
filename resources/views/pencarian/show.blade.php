@extends('layout.home')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <img src="{{ asset('storage/' . $pencarian->image_url) }}" class="card-img-top" alt="{{ $pencarian->name }}" style="height: 400px; object-fit: cover;">
        <div class="card-body">
            <h1 class="card-title">{{ $pencarian->name }}</h1>
            <p>{{ $pencarian->description }}</p>
            <p><strong>Location:</strong> {{ $pencarian->location }}</p>
            <p><strong>Available From:</strong> {{ $pencarian->available_from }} to {{ $pencarian->available_to }}</p>
            <p><strong>Price:</strong> ${{ number_format($pencarian->price, 2) }}</p>
            <p><strong>Facilities:</strong> {{ $pencarian->facilities }}</p>
            <p><strong>Rating:</strong> {{ $pencarian->rating }}/5</p>
            <p><strong>Contact:</strong> {{ $pencarian->phone_number }}</p>

            <!-- Google Maps Embed -->
            <h4>Location Map</h4>
            <iframe
                width="100%"
                height="300"
                frameborder="0"
                style="border:0"
                src="https://www.google.com/maps/embed/v1/place?key=YOUR_GOOGLE_MAPS_API_KEY&q={{ urlencode($pencarian->location) }}"
                allowfullscreen>
            </iframe>

            <!-- Booking Form -->
            <h3 class="mt-4">Book This Accommodation</h3>
            <form action="{{ route('booking.store') }}" method="POST">
                @csrf
                <input type="hidden" name="accommodation_id" value="{{ $pencarian->id }}">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="date" class="form-label">Booking Date</label>
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="quantity" class="form-label">Number of Guests</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success w-100">Book Now</button>
            </form>
        </div>
    </div>
</div>
@endsection
