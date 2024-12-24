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
            <th>Status Pembayaran</th>
            <td>
                <span class="badge
                    @if($booking->payment_status == 'success') bg-success
                    @elseif($booking->payment_status == 'pending') bg-warning
                    @elseif($booking->payment_status == 'failed') bg-danger
                    @else bg-secondary
                    @endif">
                    {{ ucfirst($booking->payment_status) }}
                </span>
            </td>
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
            <td>{{ number_format($booking->total_price, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Pencarian ID</th>
            <td>{{ $booking->pencarian_id }}</td>
        </tr>
        <tr>
            <th>Room Details</th>
            <td>
                <strong>Room Name:</strong> {{ $booking->room->name ?? 'N/A' }}<br>
                <strong>Room Price per Night:</strong> {{ number_format($booking->room->price_per_night ?? 0, 0, ',', '.') }}
            </td>
        </tr>
    </table>
    <a href="{{ route('admin.booking.user_list') }}" class="btn btn-primary">Kembali ke Daftar Pengguna</a>
</div>
@endsection
