@extends('layout.home')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <!-- Gambar Utama -->
        <img src="{{ asset('storage/' . $pencarian->image_url) }}"
             class="card-img-top"
             alt="{{ $pencarian->name }}"
             style="height: 400px; object-fit: cover;">

        <!-- Konten Detail -->
        <div class="card-body">
            <!-- Judul dan Harga -->
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="card-title">{{ $pencarian->name }}</h1>
                    <span class="badge bg-warning text-dark">⭐ {{ $pencarian->rating }} / 5</span>
                </div>
                <div class="text-end">
                    <h4 class="text-danger fw-bold">
                        Rp {{ number_format($pencarian->price, 0, ',', '.') }}
                    </h4>
                    <a href="#" class="btn btn-warning">Select Room</a>
                </div>
            </div>

            <!-- Deskripsi -->
            <p class="mt-3">{{ $pencarian->description }}</p>

            <!-- Informasi Tambahan -->
            <div class="row mt-4">
                <div class="col-md-6">
                    <p><strong>Location:</strong> {{ $pencarian->location }}</p>
                    <p><strong>Available:</strong> {{ $pencarian->available_from }} to {{ $pencarian->available_to }}</p>
                    <p><strong>Contact:</strong> {{ $pencarian->phone_number }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Facilities:</strong></p>
                    <ul>
                        @foreach(explode(',', $pencarian->facilities) as $facility)
                            <li>{{ trim($facility) }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Lokasi Peta -->
            <h4 class="mt-4">Location Map</h4>
            <div class="map-container" style="height: 300px; border-radius: 10px; overflow: hidden;">
                <iframe
                    src="https://www.google.com/maps?q={{ $pencarian->latitude }},{{ $pencarian->longitude }}&output=embed"
                    width="100%" height="100%" frameborder="0"
                    style="border:0;" allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
</div>
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
