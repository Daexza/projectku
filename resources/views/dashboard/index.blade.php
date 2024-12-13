<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Bexplore</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 15px;
            height: 100vh;
        }
        .sidebar a {
            text-decoration: none;
            color: #000;
            display: block;
            padding: 10px 0;
        }
        .sidebar a.active {
            color: #007bff;
        }
        .sidebar a:hover {
            color: #007bff;
        }
        .sidebar .notification {
            position: relative;
        }
        .sidebar .notification .badge {
            position: absolute;
            top: 0;
            right: 0;
            background-color: #ff0000;
            color: #fff;
            border-radius: 50%;
            padding: 5px 10px;
        }
        .sidebar .offer {
            background-color: #e0f7fa;
            padding: 15px;
            border-radius: 10px;
            margin-top: 20px;
            text-align: center;
        }
        .sidebar .offer img {
            width: 100%;
            border-radius: 10px;
        }
        .main-content {
            padding: 20px;
        }
        .main-content .search-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .main-content .search-bar input,
        .main-content .search-bar button {
            border-radius: 10px;
            padding: 10px;
            border: 1px solid #ced4da;
        }
        .main-content .search-bar button {
            background-color: #007bff;
            color: #fff;
        }
        .main-content .card {
            border-radius: 15px;
            overflow: hidden;
        }
        .main-content .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        .main-content .card-body {
            padding: 15px;
        }
        .main-content .card-body h5 {
            font-size: 1.25rem;
            margin-bottom: 10px;
        }
        .main-content .card-body p {
            margin-bottom: 5px;
        }
        .main-content .card-body .price {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .main-content .tabs {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .main-content .tabs a {
            text-decoration: none;
            color: #000;
            padding: 10px 20px;
            border-radius: 10px;
        }
        .main-content .tabs a.active {
            background-color: #007bff;
            color: #fff;
        }
        .main-content .tabs a:hover {
            background-color: #007bff;
            color: #fff;
        }
        .small-card img {
            height: 60px;
        }
        .small-card .card-body {
            padding: 10px;
        }
        .small-card .card-body h5 {
            font-size: 1rem;
            margin-bottom: 5px;
        }
        .small-card .card-body p {
            margin-bottom: 5px;
        }
        .small-card .card-body .price {
            font-size: 1.25rem;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <div class="d-flex align-items-center mb-4">
                    <img alt="Logo" class="me-2" height="40" src="https://placehold.co/40x40" width="40"/>
                    <h4>BExplore</h4>
                </div>
                <a class="active" href="#"><i class="fas fa-home me-2"></i>Dashboard</a>
                <a href="#"><i class="fas fa-city me-2"></i>Explore City</a>
                <a class="notification" href="#"><i class="fas fa-bell me-2"></i>Notification<span class="badge">2</span></a>
                <a href="#"><i class="fas fa-heart me-2"></i>Favorite</a>
                <a href="#"><i class="fas fa-cog me-2"></i>Settings</a>
                <div class="offer mt-4">
                    <h5>Get 45% Off.</h5>
                    <p>Special Price for you, hotel discount up to 45%</p>
                    <img alt="Special Offer" src="https://placehold.co/200x100"/>
                </div>
                <a class="mt-4" href="#"><i class="fas fa-sign-out-alt me-2"></i>Log Out</a>
            </div>
            <div class="col-md-10 main-content">
                <h2>Find hotel to stay <i class="fas fa-hotel"></i></h2>
                <div class="search-bar">
                    <div class="d-flex flex-column me-2">
                        <label for="date">Date</label>
                        <input class="form-control" id="date" placeholder="Select Date" type="text"/>
                    </div>
                    <div class="d-flex flex-column me-2">
                        <label for="location">Where to</label>
                        <input class="form-control" id="location" placeholder="Yogyakarta, Indonesia" type="text"/>
                    </div>
                    <button class="btn btn-primary align-self-end">Search</button>
                </div>
                <h4>Lodging available</h4>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card">
                            <img alt="Shikara Hotel" src="https://placehold.co/200x150"/>
                            <div class="card-body">
                                <h5 class="card-title">Shikara Hotel</h5>
                                <p class="card-text"><i class="fas fa-map-marker-alt me-2"></i>Jl. Aston No. 72 Yogyakarta</p>
                                <p class="price">$42.72 / night</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img alt="Visala Hotel" src="https://placehold.co/200x150"/>
                            <div class="card-body">
                                <h5 class="card-title">Visala Hotel</h5>
                                <p class="card-text"><i class="fas fa-map-marker-alt me-2"></i>Jl. Kebon No. 17 Yogyakarta</p>
                                <p class="price">$38.42 / night</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img alt="Shikara Hotel" src="https://placehold.co/200x150"/>
                            <div class="card-body">
                                <h5 class="card-title">Shikara Hotel</h5>
                                <p class="card-text"><i class="fas fa-map-marker-alt me-2"></i>Jl. Gatot No. 72 Yogyakarta</p>
                                <p class="price">$40.14 / night</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tabs mb-4">
                    <a class="active" href="#">Most Popular</a>
                    <a href="#">Special Offers</a>
                    <a href="#">Near Me</a>
                    <a href="#">View All</a>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card small-card">
                            <img alt="Shikara Hotel" src="https://placehold.co/200x60"/>
                            <div class="card-body">
                                <h5 class="card-title">Shikara Hotel</h5>
                                <p class="card-text"><i class="fas fa-map-marker-alt me-2"></i>Indonesia</p>
                                <p class="price">$42 / night</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card small-card">
                            <img alt="Hogi Hotel" src="https://placehold.co/200x60"/>
                            <div class="card-body">
                                <h5 class="card-title">Hogi Hotel</h5>
                                <p class="card-text"><i class="fas fa-map-marker-alt me-2"></i>Thailand</p>
                                <p class="price">$44 / night</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card small-card">
                            <img alt="Laganu Hotel" src="https://placehold.co/200x60"/>
                            <div class="card-body">
                                <h5 class="card-title">Laganu Hotel</h5>
                                <p class="card-text"><i class="fas fa-map-marker-alt me-2"></i>Japan</p>
                                <p class="price">$38 / night</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card small-card">
                            <img alt="Ibis Hotel" src="https://placehold.co/200x60"/>
                            <div class="card-body">
                                <h5 class="card-title">Ibis Hotel</h5>
                                <p class="card-text"><i class="fas fa-map-marker-alt me-2"></i>Indonesia</p>
                                <p class="price">$45 / night</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#date", {
            mode: "range",
            dateFormat: "Y-m-d"
        });
    </script>
</body>
</html>
