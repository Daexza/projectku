@extends('admin.admin')

@section('content')
<div class="container">
    <h1>Booking List</h1>
    <table class="table table-striped" id="bookingsTable">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Jumlah Booking</th>
                <th>Detail Booking</th>
                <th>Aksi</th>
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
                            <a href="{{ route('admin.booking.detail', $booking->id) }}" class="btn btn-info btn-sm">Lihat Detail</a>
                        @endforeach
                    </td>
                    <td>
                        @foreach($bookings->where('email', $user->email) as $booking)
                            <form action="{{ route('admin.booking.destroy', $booking->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.users') }}" class="btn btn-primary">Kembali ke Daftar Pengguna</a>
</div>

<!-- Include DataTables CSS and JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- Initialize DataTables -->
<script>
    $(document).ready(function() {
        $('#bookingsTable').DataTable();
    });
</script>

@push('scripts')
<script>
    // Optional: Sweet Alert untuk konfirmasi
    $(document).ready(function() {
        $('.btn-danger').on('click', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: 'Apakah Anda yakin ingin menghapus booking ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endpush
@endsection
