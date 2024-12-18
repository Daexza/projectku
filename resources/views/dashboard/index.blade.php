
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>BExplore</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .hero-section {
            position: relative;
            text-align: center;
            color: white;
        }
        .hero-section img {
            width: 100%;
            height: auto;
        }
        .hero-section .hero-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .hero-section .hero-text h1 {
            font-size: 48px;
            font-weight: bold;
        }
        .hero-section .hero-text p {
            font-size: 24px;
        }
        .hero-section .hero-text .btn {
            background-color: #6c63ff;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
        }
        .recommendation-section {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .recommendation-section h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .recommendation-section .card {
            margin-bottom: 20px;
        }
        .recommendation-section .card img {
            max-width: 100%;
            height: auto;
        }
        .footer {
            background-color: #d1e7f3;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand text-primary" href="#">BExplore</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pencarian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="main-content">
        <div class="hero-section">
            <img alt="Beautiful beach resort with overwater bungalows and a clear blue sky" height="600" src="https://storage.googleapis.com/a1aa/image/uP3MqAfoj12rZSOJvcSnzPIt8KM0wLseF9SjOaKXTscGDA8TA.jpg" width="1200"/>
            <div class="hero-text">
                <h1>BExplore</h1>
                <p>Explore Attractions, Find Perfect Stays with BExplore!</p>
                <button class="btn btn-primary">BExplore Accommodations</button>
            </div>
        </div>
        <div class="recommendation-section">
            <h2>Popular Rooms</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img alt="Luxurious hotel room with a king-sized bed and a beautiful view" class="card-img-top" height="400" src="https://storage.googleapis.com/a1aa/image/LrvNSccZDc7zFJ3fY93MgaJSBV3bABMmqYfgG5fABGAOWA4nA.jpg" width="600"/>
                        <div class="card-body">
                            <h5 class="card-title">Luxury Suite</h5>
                            <p class="card-text">Experience the ultimate luxury with our top-rated suite.</p>
                            <a class="btn btn-primary" href="#">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img alt="Cozy hotel room with modern amenities" class="card-img-top" height="400" src="https://storage.googleapis.com/a1aa/image/Gy7uW01sGXLUHRsUFP0JjIC2thdt4Bl1ersfWVnRg1jJLA8TA.jpg" width="600"/>
                        <div class="card-body">
                            <h5 class="card-title">Deluxe Room</h5>
                            <p class="card-text">Enjoy a comfortable stay in our deluxe room with modern amenities.</p>
                            <a class="btn btn-primary" href="#">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img alt="Spacious hotel room with a beautiful city view" class="card-img-top" height="400" src="https://storage.googleapis.com/a1aa/image/UBeffUzQHzBlJIX4fgpnnyUmJgqefrkNbTeFQmR4enKPGLA8TA.jpg" width="600"/>
                        <div class="card-body">
                            <h5 class="card-title">City View Room</h5>
                            <p class="card-text">Relax in our spacious room with a stunning view of the city.</p>
                            <a class="btn btn-primary" href="#">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="mt-5">Best Offers</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img alt="Hotel room with a special discount offer" class="card-img-top" height="400" src="https://storage.googleapis.com/a1aa/image/WBSPAjOWzp7PCBytSDlxxZQYZdHBtTeIbW9tPmy6WXFiFAeTA.jpg" width="600"/>
                        <div class="card-body">
                            <h5 class="card-title">Special Discount</h5>
                            <p class="card-text">Get a special discount on your first booking.</p>
                            <a class="btn btn-primary" href="#">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img alt="Hotel room with a complimentary breakfast offer" class="card-img-top" height="400" src="https://storage.googleapis.com/a1aa/image/cnf2yetYeMcnAI0QNhr9H7Ja1P3Ti6Zr0J3lqk8kUgWXWA4nA.jpg" width="600"/>
                        <div class="card-body">
                            <h5 class="card-title">Complimentary Breakfast</h5>
                            <p class="card-text">Enjoy a complimentary breakfast with your stay.</p>
                            <a class="btn btn-primary" href="#">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img alt="Hotel room with a free night stay offer" class="card-img-top" height="400" src="https://storage.googleapis.com/a1aa/image/Goq7fwZeIajqDUL9lerfZMgNA6R13Usq9mtUew5wmIXRYBgfE.jpg" width="600"/>
                        <div class="card-body">
                            <h5 class="card-title">Free Night Stay</h5>
                            <p class="card-text">Book 3 nights and get the 4th night free.</p>
                            <a class="btn btn-primary" href="#">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <p>&copy; 2023 BExplore. All rights reserved.</p>
        <p>Follow us on:
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </p>
    </footer>
