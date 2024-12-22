@extends('admin.admin')

@section('content')
<div class="container">
    <h1>Detail Booking</h1>
    <table class="table">
        <tr>
            <th>Nama</th>
            <td>{{ $booking->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $booking->email }}</td>
        </tr>
        <tr>
            <th>Room ID</th>
            <td>{{ $booking->room_id }}</td>
        </tr>
        <tr>
            <th>Check In</th>
            <td>{{ $booking->check_in }}</td>
        </tr>
        <tr>
            <th>Check Out</th>
            <td>{{ $booking->check_out }}</td>
        </tr>
        <tr>
            <th>Total Price</th>
            <td>{{ $booking->total_price }}</td>
        </tr>
        <tr>
            <th>Pencarian ID</th>
            <td>{{ $booking->pencarian_id }}</td>
        </tr>
        <tr>
            <th>Room Details</th>
            <td>
                <strong>Room Name:</strong> {{ $booking->room->name ?? 'N/A' }}<br>
                <strong>Room Price per Night:</strong> {{ $booking->room->price_per_night ?? 'N/A' }}
            </td>
        </tr>
    </table>
    <a href="{{ route('admin.booking.user_list') }}" class="btn btn-primary">Kembali ke Daftar Pengguna</a>
</div>
@endsection