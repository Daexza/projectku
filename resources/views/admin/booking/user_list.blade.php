@extends('admin.admin')

@section('content')
<div class="container">
    <h1>Daftar Pengguna yang Telah Melakukan Booking</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Jumlah Booking</th>
                <th>Detail Booking</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $bookings->where('email', $user->email)->count() }}</td>
                    <td>
                    @foreach($bookings->where('email', $user->email) as $booking)
                    <a href="{{ route('admin.booking.show', $booking->id) }}" class="btn btn-info btn-sm">Lihat Detail</a>
                    @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.users') }}" class="btn btn-primary">Kembali ke Daftar Pengguna</a>
</div>
@endsection