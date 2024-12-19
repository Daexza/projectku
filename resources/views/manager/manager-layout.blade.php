<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Dashboard</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        .dashboard-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }
        
        .dashboard-card {
            background-color: #f4f4f4;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            flex: 1;
            min-width: 250px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .quick-actions {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }
        
        .btn-custom {
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
        }
    </style>
    
    @yield('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Manager Dashboard</a>
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="{{ route('manager.dashboard') }}">Dashboard</a>
                <a class="nav-item nav-link" href="{{ route('manager.daftar-penginapan') }}">Daftar Penginapan</a>
                <a class="nav-item nav-link" href="{{ route('manager.tambah-penginapan') }}">Tambah Penginapan</a>
                <a class="nav-item nav-link" href="{{ route('manager.customer-list') }}">Customer List</a>
                <a class="nav-item nav-link" href="{{ route('logout') }}">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
    @yield('scripts')
</body>
</html>