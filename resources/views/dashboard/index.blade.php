<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   BExplore
  </title>
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
  <style>
   body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .navbar {
            background-color: rgba(0, 123, 255, 0.8);
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .hero {
            position: relative;
            text-align: center;
            color: white;
        }
        .hero img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }
        .hero .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .hero h2 {
            font-size: 2.5em;
            margin: 0;
        }
        .hero p {
            font-size: 1.2em;
            margin: 10px 0;
        }
        .hero button {
            padding: 10px 20px;
            font-size: 1em;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .hero button:hover {
            background-color: #0056b3;
        }
        .section-title {
            text-align: center;
            margin: 40px 0 20px;
            font-size: 2em;
            color: #333;
        }
        .recommendations, .most-popular, .room-offers, .best-deals {
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .card {
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            width: 300px;
        }
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .card-content {
            padding: 15px;
        }
        .card-content h3 {
            margin: 0;
            font-size: 1.5em;
            color: #333;
        }
        .card-content p {
            margin: 10px 0;
            color: #666;
        }
        .card-content button {
            padding: 10px 15px;
            font-size: 0.9em;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .card-content button:hover {
            background-color: #0056b3;
        }
        footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 40px;
        }
        footer p {
            margin: 0;
        }
  </style>
 </head>
 <body>
  <nav class="navbar navbar-expand-lg navbar-light">
   <div class="container-fluid">
    <a class="navbar-brand" href="#">
     BExplore
    </a>
    <button aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse" type="button">
     <span class="navbar-toggler-icon">
     </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
     <ul class="navbar-nav ms-auto">
      <li class="nav-item">
       <a class="nav-link" href="#">
        Home
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="#">
        Search
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="#">
        Rooms
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="#">
        Register
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="#">
        Login
       </a>
      </li>
     </ul>
    </div>
   </div>
  </nav>
  <section class="hero">
   <img alt="Beautiful resort" height="400" src="https://i0.wp.com/theluxurytravelexpert.com/wp-content/uploads/2023/06/best-hotels-resorts-maldives.jpg?fit=1280%2C720&ssl=1" width="1200"/>
   <div class="overlay">
    <h2>
     Your Dream Vacation Awaits
    </h2>
    <p>
     Explore our top-rated accommodations for every budget
    </p>
    <button class="btn btn-primary" onclick="window.location.href='{{ route('login') }}'">
        Explore Now
    </button>
   </div>
  </section>
  <section>
   <h2 class="section-title">
    Most Popular
   </h2>
   <div class="most-popular">
    <div class="card">
     <img alt="Luxury hotel" height="200" src="https://storage.googleapis.com/a1aa/image/kHd6w26OWgraPpKZdrG54ScJXIEWfqQ2sLLa2kveMvfF8M4nA.jpg" width="300"/>
     <div class="card-content">
      <h3>
       Luxury Hotel
      </h3>
      <p>
       Experience the best in class amenities with a stunning view.
      </p>
     </div>
    </div>
    <div class="card">
     <img alt="Cozy Cottage" height="200" src="https://storage.googleapis.com/a1aa/image/mU6iVP15O74iLpimVi9zf78HIOZuAimeAfvrD8foPvtb4ZwPB.jpg" width="300"/>
     <div class="card-content">
      <h3>
       Cozy Cottage
      </h3>
      <p>
       A peaceful retreat surrounded by nature and tranquility.
      </p>

     </div>
    </div>
    <div class="card">
     <img alt="Beachside Villa" height="200" src="https://storage.googleapis.com/a1aa/image/QfVIwRiF5lyWSa9kVoSxa5ZSk6QNvtCDFLHEThd4n6QCPDeTA.jpg" width="300"/>
     <div class="card-content">
      <h3>
       Beachside Villa
      </h3>
      <p>
       Wake up to the sound of waves and endless ocean views.
      </p>

     </div>
    </div>
    <div class="card">
     <img alt="Mountain Retreat" height="200" src="https://i1.wp.com/anekatempatwisata.com/wp-content/uploads/2023/10/Mountain-Cabin-Bandung-mountaincabinbdg-11.jpg?resize=860&w=860" width="300"/>
     <div class="card-content">
      <h3>
       Mountain Retreat
      </h3>
      <p>
       Enjoy a serene getaway in the mountains with breathtaking views.
      </p>

     </div>
    </div>
   </div>
  </section>
  <section>
   <h2 class="section-title">
    Room Offers
   </h2>
   <div class="room-offers">
    <div class="card">
<img alt="Beautiful resort" src="https://image-tc.galaxy.tf/wijpeg-b2bxnqyozyfe6qk1nui4qa0ip/executive-king.jpg?" width="1200" height="400" />
     <div class="card-content">
      <h3>
       City Hotel
      </h3>
      <p>
       Stay in the heart of the city with easy access to all attractions.
      </p>

     </div>
    </div>
    <div class="card">
     <img alt="Desert Oasis" height="200" src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/340424442.jpg?k=8b6786dab01991748eeb6278850cac8cabc7e2093c00dc34fe962d4caa7318a2&o=&hp=1.jpg" width="300"/>
     <div class="card-content">
      <h3>
       Desert Oasis
      </h3>
      <p>
       Experience luxury and tranquility in the middle of the desert.
      </p>

     </div>
    </div>
    <div class="card">
     <img alt="Seaside Resort" height="200" src="https://www.nikoseasideresort.com/wp-content/uploads/sites/13/2022/04/premier_suite_slide_03.jpg" width="300"/>
     <div class="card-content">
      <h3>
       Seaside Resort
      </h3>
      <p>
       Relax and unwind at our luxurious seaside resort.
      </p>

     </div>
    </div>
    <div class="card">
     <img alt="Forest Cabin" height="200" src="https://images.stockcake.com/public/d/1/d/d1de40a1-256e-45ed-8fff-8668ace43ea5_large/cozy-forest-cabin-stockcake.jpghttps://www.interiorzine.com/wp-content/uploads/2016/04/urban-apartment.jpg" width="300"/>
     <div class="card-content">
      <h3>
       Forest Cabin
      </h3>
      <p>
       Escape to a cozy cabin in the forest for a peaceful retreat.
      </p>

     </div>
    </div>
   </div>
  </section>
  <section>
   <h2 class="section-title">
    Best Deals
   </h2>
   <div class="best-deals">
    <div class="card">
     <img alt="Urban Apartment" height="200" src="https://www.interiorzine.com/wp-content/uploads/2016/04/urban-apartment.jpg" width="300"/>
     <div class="card-content">
      <h3>
       Urban Apartment
      </h3>
      <p>
       Modern apartment in the city center with all amenities.
      </p>

     </div>
    </div>
    <div class="card">
     <img alt="Country House" height="200" src="https://lbcdn.airpaz.com/hotelimages/2537046/luxury-country-house-mauromati-742b6431d099c8c7b5b93360aa9c69f0.jpg" width="300"/>
     <div class="card-content">
      <h3>
       Country House
      </h3>
      <p>
       Spacious country house with beautiful surroundings.
      </p>

     </div>
    </div>
    <div class="card">
     <img alt="Lakefront Lodge" height="200" src="https://images.trvl-media.com/lodging/38000000/37810000/37804500/37804403/64f096ef.jpg?impolicy=resizecrop&rw=575&rh=575&ra=fill.jpg" width="300"/>
     <div class="card-content">
      <h3>
       Lakefront Lodge
      </h3>
      <p>
       Enjoy a relaxing stay at our lodge by the lake.
      </p>

     </div>
    </div>
    <div class="card">
     <img alt="Historic Inn" height="200" src="https://images.squarespace-cdn.com/content/v1/656f2f448e9d465eab0f1aeb/1702321001779-IJLZP058HRB5MP9KCJPK/ritz2.jpg" width="300"/>
     <div class="card-content">
      <h3>
       Historic Inn
      </h3>
      <p>
       Stay at a charming inn with a rich history and modern comforts.
      </p>

     </div>
    </div>
   </div>
  </section>

  <script crossorigin="anonymous" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+3i5o5p5Vb5mY5f5d5m5f5m5f5m5f" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
  </script>
 </body>
</html>    <footer class="footer">
        <p>&copy; 2023 BExplore. All rights reserved.</p>
        <p>Follow us on:
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </p>
    </footer>
