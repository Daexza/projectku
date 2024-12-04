@extends('layout.home')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Search Destination or Accommodation</h1>

    <!-- Search Bar -->
    <form action="{{ route('pencarian.search') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Enter destination or accommodation" value="{{ $query ?? '' }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <!-- Images Section -->
    <div class="row">
        @forelse ($pencarian as $item)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $item->image_url) }}" class="card-img-top" alt="{{ $item->name }}" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text">{{ Str::limit($item->description, 50) }}</p>
                    <p><strong>Location:</strong> {{ $item->location }}</p>
                    <p><strong>Price:</strong> ${{ number_format($item->price, 2) }}</p>
                    <a href="{{ route('pencarian.show', $item->id) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p class="text-center">No results found.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
