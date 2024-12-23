@extends('admin.admin')

@section('content')

<div class="container">

    <h1>Admin Dashboard</h1>

    <a href="{{ route('admin.users') }}" class="btn btn-secondary">View Users</a>

</div>

@endsection