@extends('layout.home')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Booking </h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Form Booking -->
    @if($room)
    <div class="card mb-4 shadow">
        <div class="card-header fw-bold">Add New Booking</div>
        <div class="card-body">
            <form method="POST" action="{{ route('booking.store') }}">
                @csrf
                <div class="row">
                    <!-- Accommodation -->
                    <div class="col-md-3 mb-3">
                        <label for="accommodation">Accommodation</label>
                        <input type="text" class="form-control" value="{{ $room->pencarian->name ?? '' }}" readonly>
                        <input type="hidden" name="pencarian_id" value="{{ $room->pencarian->id ?? '' }}">
                    </div>

                    <!-- Room -->
                    <div class="col-md-3 mb-3">
                        <label for="room">Room</label>
                        <input type="text" class="form-control" value="{{ $room->room_number ?? '' }}" readonly>
                        <input type="hidden" name="room_id" value="{{ $room->room_id ?? '' }}">
                    </div>

                    <!-- Room Type -->
                    <div class="col-md-3 mb-3">
                        <label for="room_type">Room Type</label>
                        <input type="text" class="form-control" value="{{ ucfirst($room->room_type ?? '') }}" readonly>
                    </div>

                    <!-- Name -->
                    <div class="col-md-3 mb-3">
                        <label for="name">Your Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <!-- Email -->
                    <div class="col-md-3 mb-3">
                        <label for="email">Your Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <!-- Check In Date -->
                    <div class="col-md-3 mb-3">
                        <label for="check_in">Check In</label>
                        <input type="date" name="check_in" class="form-control" required>
                    </div>

                    <!-- Check Out Date -->
                    <div class="col-md-3 mb-3">
                        <label for="check_out">Check Out</label>
                        <input type="date" name="check_out" class="form-control" required>
                    </div>

                    <!-- Total Price -->
                    <div class="col-md-3 mb-3">
                        <label for="total_price">Total Price</label>
                        <input type="text" class="form-control" value="Rp 0,00" readonly id="total_price">
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Book Now</button>
            </form>
        </div>
    </div>
    @endif

    <!-- Booking List Table -->
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white fw-bold">
            <i class="fas fa-bookmark me-2"></i>Booking List
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover" id="bookingTable">
                <thead class="bg-info text-white">
                    <tr>
                        <th>#</th>
                        <th>Accommodation</th>
                        <th>Room</th>
                        <th>Room Type</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bookings as $booking)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $booking->pencarian->name ?? '-' }}</td>
                            <td>{{ $booking->room->room_number ?? '-' }}</td>
                            <td>{{ ucfirst($booking->room->room_type ?? '-') }}</td>
                            <td>{{ $booking->name }}</td>
                            <td>{{ $booking->email }}</td>
                            <td>{{ $booking->check_in }}</td>
                            <td>{{ $booking->check_out }}</td>
                            <td>Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center text-muted">No bookings found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- DataTable Initialization Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#bookingTable').DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "pagingType": "simple_numbers",
                "language": {
                    "search": "Search bookings:",
                    "zeroRecords": "No matching records found"
                }
            });
        });
    </script>

    <!-- Additional CSS for Styling -->

    <style>

        .table th, .table td {
            padding: 12px;
            text-align: center;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }

        .table th {
            background-color: #007bff;
            color: white;
        }

        .badge {
            font-size: 0.9rem;
            padding: 5px 10px;
            border-radius: 12px;
        }

        .btn-sm {
            font-size: 0.875rem;
            padding: 6px 12px;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 1.1rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        .table td, .table th {
            vertical-align: middle;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
    </style>


<script>
    // Hitung total harga saat tanggal check_in atau check_out berubah
    document.querySelectorAll('[name="check_in"], [name="check_out"]').forEach(input => {
        input.addEventListener('change', () => {
            const checkIn = document.querySelector('[name="check_in"]').value;
            const checkOut = document.querySelector('[name="check_out"]').value;

            if (checkIn && checkOut) {
                const startDate = new Date(checkIn);
                const endDate = new Date(checkOut);
                const days = (endDate - startDate) / (1000 * 60 * 60 * 24);

                if (days > 0) {
                    const pricePerNight = {{ $room->price_per_night ?? 0 }};
                    const totalPrice = days * pricePerNight;

                    // Format harga ke dalam Rupiah
                    document.getElementById('total_price').value = `Rp ${new Intl.NumberFormat('id-ID').format(totalPrice)}`;
                } else {
                    document.getElementById('total_price').value = "Rp 0,00";
                }
            }
        });
    });
</script>

@endsection
