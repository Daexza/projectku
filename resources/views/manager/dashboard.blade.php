@extends('manager.manager-layout')

@section('content')
<div class="dashboard-container">
    <div class="dashboard-card">
        <h2>Total Customers</h2>
        <p>{{ $totalCustomers }}</p>
    </div>
    <div class="dashboard-card">
        <h2>Total Penginapan</h2>
        <p>{{ $totalPenginapan }}</p>
    </div>
    <div class="quick-actions">
        <a href="{{ route('manager.tambah-penginapan') }}" class="btn btn-custom">Tambah Penginapan</a>
        <a href="{{ route('manager.customer-list') }}" class="btn btn-custom">Lihat Customers</a>
    </div>
</div>
@endsection