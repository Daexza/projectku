@extends('admin.admin')

@section('content')
    <div class="container">
        <h1>Accommodations</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accommodations as $accommodation)
                    <tr>
                        <td>{{ $accommodation->name }}</td>
                        <td>{{ $accommodation->description }}</td>
                        <td>{{ $accommodation->location }}</td>
                        <td>{{ $accommodation->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection