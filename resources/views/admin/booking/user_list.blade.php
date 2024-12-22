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
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $bookings->where('email', $user->email)->count() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('booking.index') }}" class="btn btn-primary">Kembali ke Daftar Booking</a>
</div>
@endsection