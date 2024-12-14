@extends('layout.home')

@section('content')
<!-- CSS Langsung di Blade -->
<style>
    /* Banner Section */
    .search-banner {
        text-align: center;
        color: white;
        padding: 80px 0;
        background: url('https://i.pinimg.com/736x/2f/23/59/2f2359470522a1e3915553e05e6134e1.jpg') no-repeat center center;
        background-size: cover;
        position: relative;
    }

    .search-banner h1 {
        font-size: 2.5rem;
        font-weight: bold;
        color: white; /* Warna putih untuk teks */
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
    }

    .search-banner .logo {
        font-size: 1.5rem;
        font-weight: bold;
        color: white;
        position: absolute;
        top: 20px;
        left: 30px;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
    }

    .search-banner .logo span {
        color: #7C4DFF;
    }

    /* Search Form */
    .search-form .form-control {
        border-radius: 25px 0 0 25px;
        box-shadow: none;
        border: 2px solid #ccc;
        background-color: white;
        color: #333;
    }

    .search-form .btn {
        border-radius: 0 25px 25px 0;
        background-color: #7C4DFF;
        color: white;
        border: none;
        padding: 10px 20px;
    }

    .search-form .btn:hover {
        background-color: #5b35cc;
    }
</style>

<div class="search-banner">
    <div class="logo">BE<span>explore</span></div>
    <div class="container text-center">
        <h1 class="mb-4">Explore Attractions, Find Perfect Stays with BExplore!</h1>
        <form action="{{ route('pencarian.search') }}" method="GET" class="search-form">
            <div class="input-group mx-auto" style="max-width: 600px;">
                <input type="text" name="search" class="form-control" placeholder="Search destination or accommodation" value="{{ $query ?? '' }}">
                <button type="submit" class="btn">Search</button>
            </div>
        </form>
    </div>
</div>

<!-- Images Section -->
<div class="container mt-5">
    <div class="row">
        @forelse ($pencarian as $item)
        <div class="col-md-4 mb-4">
            <div class="card shadow">
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
