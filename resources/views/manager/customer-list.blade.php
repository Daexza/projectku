@extends('manager.manager-layout')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Customer</h2>
        <a href="{{ route('manager.export-customers', request()->query()) }}" 
           class="btn btn-success">
            <i class="fas fa-file-export"></i> Ekspor CSV
        </a>
    </div>

    {{-- Form Pencarian --}}
    <form method="GET" action="{{ route('manager.customer-list') }}" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" 
                       placeholder="Cari nama, email, telepon"
                       value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <input type="date" name="start_date" class="form-control" 
                       value="{{ request('start_date') }}">
            </div>
            <div class="col-md-2">
                <input type="date" name="end_date" class="form-control" 
                       value="{{ request('end_date') }}">
            </div>
            <div class="col-md-2">
                <select name="sort_by" class="form-control">
                    <option value="created_at">Tanggal Daftar</option>
                    <option value="full_name">Nama</option>
                    <option value="email">Email</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Cari</button>
            </