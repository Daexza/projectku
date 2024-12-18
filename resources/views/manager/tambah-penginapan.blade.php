@extends('manager.manager-layout')

@section('content')
<div class="container">
    <h2>Tambah Penginapan Baru</h2>
    <form action="{{ route('manager.simpan-penginapan') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Nama Penginapan</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Lokasi</label>
            <select name="location" class="form-control" required>
                <option value="Yogyakarta">Yogyakarta</option>
                <option value="Bali">Bali</option>
                <option value="Labuan Bajo">Labuan Bajo</option>
                <option value="Jakarta">Jakarta</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Latitude</label>
            <input type="number" name="latitude" step="0.0001" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Longitude</label>
            <input type="number" name="longitude" step="0.0001" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nomor Telepon</label>
            <input type="text" name="phone_number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Fasilitas</label>
            <textarea name="facilities" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Rating</label>
            <input type="number" name="rating" step="0.1" min="0" max="5" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Foto (Opsional)</label>
            <input type="file" name="image" class="form-control">
            <small>Atau masukkan URL Gambar</small>
            <input type="url" name="image_url" class="form-control">
        </div>

        <div class="mb-3">
            <label>Tersedia Dari</label>
            <input type="date" name="available_from" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tersedia Sampai</label>
            <input type="date" name="available_to" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Penginapan</button>
    </form>
</div>
@endsection