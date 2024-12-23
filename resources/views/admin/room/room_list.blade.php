@extends('admin.admin')

@section('content')
<div class="container">
    <h1>Daftar Kamar</h1>
    <table class="table table-striped" id="roomsTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nomor Kamar</th>
                <th>Fasilitas</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
            <tr>
                <td>{{ $room->room_id }}</td> <!-- Use room_id instead of id -->
                <td>{{ $room->room_number }}</td>
                <td>{{ $room->facilities }}</td> <!-- Assuming you have a description field -->
                <td>Rp {{ number_format($room->price_per_night, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ route('admin.room.edit', $room->room_id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.room.destroy', $room->room_id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kamar ini?');">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Include DataTables JS and CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- Initialize DataTables -->
<script>
    $(document).ready(function() {
        $('#roomsTable').DataTable();
    });
</script>
@endsection