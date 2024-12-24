<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
            background-color: #e3f2fd;
        }

        .left-sidebar {
            background-color: #e3f2fd;
            width: 250px;
            height: 100vh;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            color: #1e88e5;
        }

        .brand-logo {
            background-color: #90caf9;
            color: #0d47a1;
            padding: 20px;
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
        }

        .brand-logo span:first-child {
            color: #0d47a1;
        }

        .brand-logo span:last-child {
            color: white;
            margin-left: 5px;
        }

        .sidebar-nav {
            padding-top: 10px;
        }

        .sidebar-item {
            list-style: none;
            padding: 10px 20px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .sidebar-item a {
            color: #0d47a1;
            text-decoration: none;
            display: flex;
            align-items: center;
            border-radius: 8px;
            padding: 8px 15px;
            transition: all 0.3s ease;
        }

        .sidebar-item a i {
            font-size: 1.2rem;
            margin-right: 15px;
        }

        .sidebar-item a:hover {
            background-color: #90caf9;
            color: #fff;
        }

        .nav-small-cap {
            background: linear-gradient(to right, #64b5f6, #42a5f5);
            padding: 8px 16px;
            border-radius: 12px;
            color: #0d47a1;
            font-size: 1.1rem;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }

        .navbar {
            background-color: #ffffff;
            border-bottom: 2px solid #42a5f5;
            color: #1e88e5;
            font-weight: bold;
        }

        .navbar-brand {
            color: #1e88e5;
        }

        .navbar-brand:hover {
            color: #0d47a1;
        }

        .content-wrapper {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <aside class="left-sidebar">
            <div class="brand-logo">
                <span>BE</span><span>Explore</span>
            </div>
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="nav-small-cap">Home</li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.users') }}" class="d-flex align-items-center">
                            <i class="fas fa-user"></i>
                            <span>Pengguna</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.room.room_list') }}" class="d-flex align-items-center">
                            <i class="fas fa-bed"></i>
                            <span>Kamar</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.booking.user_list') }}" class="d-flex align-items-center">
                            <i class="fas fa-book"></i>
                            <span>Booking</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">Auth</li>
                    <li class="sidebar-item">
                        <a href="{{ route('logout') }}" class="d-flex align-items-center"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="content-wrapper">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Admin Dashboard</a>
                </div>
            </nav>

            <div>
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
