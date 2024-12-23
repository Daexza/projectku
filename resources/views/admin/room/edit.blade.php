@extends('admin.admin') <!-- Assuming you have a layout file named admin.admin -->

@section('content')
<div class="container">
    <h1>Edit Kamar</h1>
    <form action="{{ route('admin.room.update', $room->room_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="room_number" class="form-label">Nomor Kamar</label>
            <input type="text" class="form-control" id="room_number" name="room_number" value="{{ $room->room_number }}" required>
        </div>

        <div class="mb-3">
            <label for="room_type" class="form-label">Tipe Kamar</label>
            <select class="form-select" id="room_type" name="room_type" required>
                <option value="standard" {{ $room->room_type == 'standard' ? 'selected' : '' }}>Standard</option>
                <option value="deluxe" {{ $room->room_type == 'deluxe' ? 'selected' : '' }}>Deluxe</option>
                <option value="suite" {{ $room->room_type == 'suite' ? 'selected' : '' }}>Suite</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="price_per_night" class="form-label">Harga per Malam</label>
            <input type="number" class="form-control" id="price_per_night" name="price_per_night" value="{{ $room->price_per_night }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="available" {{ $room->status == 'available' ? 'selected' : '' }}>Tersedia</option>
                <option value="occupied" {{ $room->status == 'occupied' ? 'selected' : '' }}>Terisi</option>
                <option value="maintenance" {{ $room->status == 'maintenance' ? 'selected' : '' }}>Perawatan</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Kamar</button>
    </form>
</div>
@endsection