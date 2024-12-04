@extends('layout.home')

@section('content')
<div class="container mt-5">
    <h1>Daftar Booking</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulir untuk melakukan booking -->
    <form action="{{ route('booking.store') }}" method="POST">
        @csrf
        <label for="accommodation_id">Accommodation ID</label>
        <input type="number" name="accommodation_id" id="accommodation_id" required>

        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>

        <label for="date">Date</label>
        <input type="date" name="date" id="date" required>

        <button type="submit">Book Now</button>
    </form>

    <!-- Tabel daftar booking -->
    <table class="table">
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
                    <td>{{ $booking->accommodation->name }}</td>  <!-- Menampilkan nama akomodasi -->
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
                    <td colspan="6">Belum ada booking.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
