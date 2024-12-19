<!-- resources/views/accommodations/index.blade.php -->

@extends('admin.admin') <!-- Change this to your layout file -->

@section('content')
<div class="container">
    <h1>Accommodations</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accommodations as $accommodation)
                <tr>
                    <td>{{ $accommodation->name }}</td>
                    <td>{{ $accommodation->location }}</td>
                    <td>
                        <a href="#" class="btn btn-info">View</a>
                        <!-- You can add more actions like edit or delete if needed -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection