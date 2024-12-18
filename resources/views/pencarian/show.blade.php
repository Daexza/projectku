@extends('layout.home')

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Kartu Gambar Utama -->
        <div class="col-12">
            <div class="card shadow mb-4">
                <!-- Gambar Utama -->
                <img src="{{ $pencarian->image_url }}"
                     alt="{{ $pencarian->name }}"
                     class="card-img-top"
                     style="height: 400px; object-fit: cover;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h1 class="card-title">{{ $pencarian->name }}</h1>
                            <span class="badge bg-warning text-dark">⭐ {{ $pencarian->rating }} / 5</span>
                        </div>
                        <div class="text-end">
                            {{-- <!-- Harga Start From -->
                            <h5 class="text-success fw-bold">
                                Start From: Rp {{ number_format($minPrice, 0, ',', '.') }}
                            </h5> --}}
                            <!-- Harga Utama (optional) -->
                            <h4 class="text-danger fw-bold">
                                Start From: Rp {{ number_format($pencarian->price ?? $minPrice, 0, ',', '.') }}
                            </h4>
                            <a href="{{ route('pencarian.room', $pencarian->id) }}" class="btn btn-warning">Select Room</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- Frame Deskripsi -->
        <div class="col-md-6">
            <div class="card shadow p-3">
                <h4 class="fw-bold mb-3">Deskripsi</h4>
                <p>{{ $pencarian->description }}</p>
                <hr>
                <p><strong>Location:</strong> {{ $pencarian->location }}</p>
                <p><strong>Available:</strong> {{ $pencarian->available_from }} to {{ $pencarian->available_to }}</p>
                <p><strong>Contact:</strong> {{ $pencarian->phone_number }}</p>
            </div>
        </div>

        <!-- Frame Fasilitas -->
        <div class="col-md-6">
            <div class="card shadow p-3">
                <h4 class="fw-bold mb-3">Fasilitas</h4>
                <ul class="list-unstyled">
                    @foreach(explode(',', $pencarian->facilities) as $facility)
                        <li class="mb-2">
                            @if(str_contains($facility, 'Kolam Renang'))
                                <i class="fas fa-swimming-pool text-primary"></i>
                            @elseif(str_contains($facility, 'Restoran'))
                                <i class="fas fa-utensils text-success"></i>
                            @elseif(str_contains($facility, 'Spa'))
                                <i class="fas fa-spa text-warning"></i>
                            @elseif(str_contains($facility, 'Gym'))
                                <i class="fas fa-dumbbell text-info"></i>
                            @elseif(str_contains($facility, 'Parkir'))
                                <i class="fas fa-parking text-dark"></i>
                            @elseif(str_contains($facility, 'WiFi'))
                                <i class="fas fa-wifi text-primary"></i>
                            @elseif(str_contains($facility, 'Bar'))
                                <i class="fas fa-glass-martini text-danger"></i>
                            @elseif(str_contains($facility, 'Layanan Kamar'))
                                <i class="fas fa-concierge-bell text-secondary"></i>
                            @else
                                <i class="fas fa-check-circle text-secondary"></i>
                            @endif
                            <span class="ms-2">{{ trim($facility) }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Lokasi Peta -->
        <div class="col-12 mt-4">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="fw-bold">Location Map</h4>
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
    </div>
</div>
@endsection
