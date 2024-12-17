@extends('layout.home')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">{{ $pencarian->name }}</h1>
    <p class="text-center">{{ $pencarian->description }}</p>

    <!-- Tampilkan gambar utama -->
    <div class="text-center mb-4">
        <img src="{{ $pencarian->image_url }}" alt="{{ $pencarian->name }}" class="img-fluid" style="height: 400px; object-fit: cover;">
    </div>

    <div class="row">
        @forelse ($rooms as $room)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Room Number: {{ $room->room_number }}</h5>
                        <p>Type: {{ ucfirst($room->room_type) }}</p>
                        <p>Price: Rp {{ number_format($room->price_per_night, 0, ',', '.') }}</p>
                        <p>Facilities: {{ $room->facilities }}</p>
                        <a href="{{ route('booking.index') }}" class="btn btn-primary">Book Now</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">No rooms available for this accommodation.</p>
        @endforelse
    </div>
</div>
@endsection
