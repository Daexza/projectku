@extends('layout.home')

@section('content')

<div class="container mt-5">
    <h1 class="text-center">{{ $pencarian->name }}</h1>
    <p class="text-center">{{ $pencarian->description }}</p>

    <!-- Gambar utama -->
    <div class="text-center mb-4">
        <img src="{{ $pencarian->image_url }}" alt="{{ $pencarian->name }}" class="img-fluid" style="height: 400px; object-fit: cover;">
    </div>

    <!-- Daftar kamar -->
    <div class="row">
        @forelse ($rooms as $room)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $room->image_url }}" class="card-img-top" alt="Room {{ $room->type }} {{ $room->number }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $room->type }} - Room {{ $room->number }}</h5>
                        <p><strong>Price:</strong> Rp {{ number_format($room->price) }}</p>
                        <p><strong>Available Date:</strong> {{ $room->available_date }}</p>
                        <p><strong>Facilities:</strong> {{ $room->facilities }}</p>
                        <a href="#" class="btn btn-primary">Book Now</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">No rooms available for this accommodation.</p>
        @endforelse
    </div>


@endsection
