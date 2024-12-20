@extends('layout.home')

@section('content')
<div class="container mt-5">
    @if($pencarian)
        <h1 class="text-center">{{ $pencarian->name }}</h1>
        <p class="text-center">{{ $pencarian->description }}</p>

        <!-- Tampilkan gambar utama -->
        <div class="text-center mb-4">
            <img src="{{ $pencarian->image_url }}" alt="{{ $pencarian->name }}" class="img-fluid" style="height: 400px; object-fit: cover;">
        </div>

        <!-- Loop berdasarkan tipe kamar -->
        @foreach(['Suite', 'Deluxe', 'Standard'] as $type)
            @php
                // Filter kamar berdasarkan tipe
                $filteredRooms = $rooms->filter(function ($room) use ($type) {
                    return strtolower($room->room_type) === strtolower($type);
                });
            @endphp

            @if($filteredRooms->isNotEmpty())
                <!-- Judul Tipe Kamar -->
                <h3 class="mt-4 text-capitalize">{{ ucfirst($type) }} Rooms</h3>
                <div class="row">
                    @foreach($filteredRooms as $room) 
                        <div class="col-md-4 mb-3">
                            <div class="card shadow-sm">
                                <!-- Gambar Kamar -->
                                <img src="{{ $room->image_url }}" alt="Room {{ $room->room_number }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">Room {{ $room->room_number }}</h5>
                                    <p>Type: {{ ucfirst($room->room_type) }}</p>
                                    <p>Price: Rp {{ number_format($room->price_per_night, 0, ',', '.') }}</p>
                                    <p>Facilities: {{ $room->facilities }}</p>
                                    <a href="{{ route('booking.index', ['room_id' => $room->room_id]) }}" class="btn btn-primary">Book Now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endforeach

    @else
        <p class="text-center">Hotel tidak ditemukan.</p>
    @endif
</div>
@endsection
