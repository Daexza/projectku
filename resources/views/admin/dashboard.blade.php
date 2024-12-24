@extends('admin.admin')

@section('content')
<div class="w-100" style="padding: 0; margin: 0;"> <!-- Menghapus padding/margin -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="card-title">
                        <i class="fas fa-tachometer-alt"></i> Dashboard Admin
                    </h2>
                </div>
                <div class="card-body">
                    <!-- Statistik -->
                    <div class="row">
                        <!-- Total Pengguna -->
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card text-center bg-info text-white mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Total Pengguna</h5>
                                    <h2>{{ $totalUsers ?? 0 }}</h2>
                                </div>
                            </div>
                        </div>

                        <!-- Total Booking -->
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card text-center bg-success text-white mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Total Booking</h5>
                                    <h2>{{ $totalBookings ?? 0 }}</h2>
                                </div>
                            </div>
                        </div>

                        <!-- Booking Pending -->
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card text-center bg-warning text-white mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Booking Pending</h5>
                                    <h2>{{ $pendingBookings ?? 0 }}</h2>
                                </div>
                            </div>
                        </div>

                        <!-- Total Pendapatan -->
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card text-center bg-danger text-white mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Total Pendapatan</h5>
                                    <h2>Rp {{ number_format($totalRevenue ?? 0, 0, ',', '.') }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Grafik dan Booking Terbaru -->
                    <div class="row mt-4">
                        <!-- Grafik Statistik Booking -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h4 class="card-title">
                                        <i class="fas fa-chart-line"></i> Statistik Booking
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="bookingChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Booking Terbaru -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h4 class="card-title">
                                        <i class="fas fa-list"></i> Booking Terbaru
                                    </h4>
                                </div>
                                <div class="card-body">
                                    @if(empty($recentBookings) || $recentBookings->isEmpty())
                                        <p class="text-muted text-center">Tidak ada data booking terbaru.</p>
                                    @else
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Kamar</th>
                                                    <th>Tanggal</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($recentBookings as $booking)
                                                    <tr>
                                                        <td>{{ $booking->user->name ?? '-' }}</td>
                                                        <td>{{ $booking->room->room_number ?? '-' }}</td>
                                                        <td>{{ $booking->created_at->format('d M Y') }}</td>
                                                        <td>
                                                            <span class="badge 
                                                                @if($booking->payment_status == 'success') bg-success 
                                                                @elseif($booking->payment_status == 'pending') bg-warning 
                                                                @else bg-danger 
                                                                @endif">
                                                                {{ ucfirst($booking->payment_status) }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Row -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Grafik Statistik Booking
    var ctx = document.getElementById('bookingChart').getContext('2d');
    var bookingChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Jumlah Booking',
                data: [
                    {{ $bookingStats['Jan'] ?? 0 }},
                    {{ $bookingStats['Feb'] ?? 0 }},
                    {{ $bookingStats['Mar'] ?? 0 }},
                    {{ $bookingStats['Apr'] ?? 0 }},
                    {{ $bookingStats['Mei'] ?? 0 }},
                    {{ $bookingStats['Jun'] ?? 0 }},
                    {{ $bookingStats['Jul'] ?? 0 }},
                    {{ $bookingStats['Agu'] ?? 0 }},
                    {{ $bookingStats['Sep'] ?? 0 }},
                    {{ $bookingStats['Okt'] ?? 0 }},
                    {{ $bookingStats['Nov'] ?? 0 }},
                    {{ $bookingStats['Des'] ?? 0 }}
                ],
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Jumlah Booking'
                    }
                }
            }
        }
    });
});
</script>
@endpush
