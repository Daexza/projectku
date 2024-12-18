@extends('manager..manager-layout')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Penginapan</h2>
        <a href="{{ url('/manager/tambah-penginapan') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Penginapan
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Penginapan</th>
                    <th>Alamat</th>
                    <th>Harga</th>
                    <th>Kapasitas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($penginapan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_penginapan }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>Rp. {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td>{{ $item->kapasitas }} Tamu</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ url('/manager/edit-penginapan/'.$item->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ url('/manager/hapus-penginapan/'.$item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data penginapan</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{ $penginapan->links() }}
    </div>
</div>
@endsection