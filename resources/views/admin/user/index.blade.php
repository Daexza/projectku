@extends('admin.admin')

@section('content')
<div class="container">
    <h1>Users</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Full Name</th> <!-- Change to Full Name -->
                <th>Email</th>
                <th>Phone Number</th> <!-- Change to Phone Number -->
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->full_name }}</td> <!-- Change to full_name -->
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone_number }}</td> <!-- Change to phone_number -->
                    <td>{{ $user->address }}</td>
                    <td>
                        <a href="#" class="btn btn-info">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection