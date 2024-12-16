@extends('layout.home')

@section('content')
<div class="container mt-5">
    <h1>Daftar Booking</h1>

    <!-- Tampilkan pesan sukses -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulir untuk melakukan booking -->
    <form action="{{ route('booking.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="mb-3">
            <label for="accommodation_id" class="form-label">Accommodation ID</label>
            <input type="number" name="accommodation_id" id="accommodation_id" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Book Now</button>
    </form>

    <!-- Tabel daftar booking -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Accommodation Name</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Booking Date</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($bookings as $booking)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $booking->accommodation->name ?? '-' }}</td> <!-- Validasi jika null -->
                    <td>{{ $booking->name }}</td>
                    <td>{{ $booking->email }}</td>
                    <td>{{ $booking->date }}</td>
                    <td>
                        <!-- Form untuk menghapus booking -->
                        <form action="{{ route('booking.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus booking ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada booking.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
