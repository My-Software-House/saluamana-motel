<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salu Amana Residence Wonosobo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">

    {{-- <link rel="stylesheet" href="style.css"> --}}
    <style>
        /* Custom Navbar */
        /* Custom Navbar */
        /* Custom Navbar */
.custom-navbar {
    background-color: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.navbar-brand {
    color: #ff5733; /* Oranye */
    font-weight: bold;
}

.nav-link {
    color: #ff5733; /* Oranye */
    margin-right: 20px;
    font-weight: 500;
}

.nav-link:hover {
    color: #ff8c66; /* Warna hover lebih terang */
}

/* Offcanvas Menu Style */
.offcanvas {
    background-color: #fff; /* Putih */
    color: #333;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.offcanvas .offcanvas-title {
    color: #ff5733; /* Oranye */
    font-weight: bold;
}

.offcanvas .nav-link {
    color: #ff5733; /* Oranye */
    font-size: 1.1rem;
    margin-bottom: 15px;
}

.offcanvas .nav-link:hover {
    color: #ff8c66; /* Warna hover lebih terang */
}

/* Booking Button */
.custom-booking-btn {
    background-color: #fff;
    color: #ff5733;
    border: 2px solid #ff5733;
    padding: 5px 15px;
    border-radius: 20px;
    font-weight: bold;
    text-transform: uppercase;
    transition: all 0.3s ease;
}

.custom-booking-btn:hover {
    background-color: #ff5733;
    color: #fff;
}

/* Header Contact Bar */
.header-top {
    background-color: #fff;
    color: #ff5733;
    font-size: 0.9rem;
    border-bottom: 1px solid #e0e0e0;
}

.contact-info i,
.social-links i {
    margin-right: 5px;
    color: #ff5733;
}

.contact-info span {
    margin-right: 20px;
    color: #ff5733;
}

.social-links a {
    color: #ff5733;
    font-size: 1.2rem;
}

.social-links a:hover {
    color: #ff8c66; /* Warna hover lebih terang */
}


        /* Hero Section */
        .hero img {
            width: 100%;
            height: 600px;
            object-fit: cover;
        }

        /* About Us Section */
        .about-us h2 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .custom-btn {
            background-color: #ff5733;
            color: #fff;
            border: none;
        }

        /* Services Section */
        .service-card {
            margin-bottom: 30px;
        }

        .service-item {
            padding: 20px;
            background-color: #f8f8f8;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .service-card:hover .service-item {
            background-color: #ff5733;
            color: #fff;
            transform: translateY(-10px);
        }

        /* Rooms Section */
        .room-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
        }

        .room-item img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .room-item:hover img {
            transform: scale(1.1);
        }

        .room-info {
            position: absolute;
            bottom: 10px;
            left: 10px;
            background: rgba(0, 0, 0, 0.6);
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
        }

        /* Remove Borders */
        .card, .navbar, .service-item, .room-item {
            border: none;
            box-shadow: none;
        }

        /* Header Top Bar */
        .header-top {
            background-color: #ff5733;
            color: #fff;
            font-size: 0.9rem;
        }

        .header-top .contact-info span {
            margin-right: 20px;
            color: #fff;
        }

        .header-top .social-links a {
            color: #fff;
            font-size: 1.2rem;
        }

        .custom-booking-btn {
            background-color: #fff;
            color: #ff5733;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: bold;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .custom-booking-btn:hover {
            background-color: #ff5733;
            color: #fff;
        }

        /* Icon Style */
        .contact-info i,
        .social-links i {
            margin-right: 5px;
        }


    </style>
</head>
<body>

<!-- Header Contact Bar -->
<div class="header-top py-2">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="contact-info">
            <span><i class="bi bi-telephone-fill"></i> (+62) 812-6655-7555</span>
            <span><i class="bi bi-envelope-fill"></i> saluamana03@gmail.com</span>
        </div>
        <div class="social-links">
            <a href="#" class="me-3"><i class="bi bi-facebook"></i></a>
            <a href="#" class="me-3"><i class="bi bi-twitter"></i></a>
            <a href="#" class="me-3"><i class="bi bi-instagram"></i></a>
            <a href="#" class="btn custom-booking-btn">Booking Now</a>
        </div>
    </div>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container">
        <a class="navbar-brand" href="#">Salu Amana</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-start" id="offcanvasNavbar">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Rooms</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>


<!-- Hero Section -->
<section class="hero">
    <div class="carousel slick-slider">
        <div><img src="{{ asset('/frontend/img/hero/hero-1.jpeg') }}" alt="Hero Image 1"></div>
        <div><img src="{{ asset('/frontend/img/hero/hero-2.jpeg') }}" alt="Hero Image 2"></div>
        <div><img src="{{ asset('/frontend/img/hero/hero-3.jpeg') }}" alt="Hero Image 3"></div>
    </div>
</section>

<!-- Tentang Kami -->
<section class="about-us py-5 text-center">
    <div class="container">
        <h2>Salu Amana Residence Wonosobo</h2>
        <p>Hotel berbasis syariah yang berada di pusat kota Wonosobo. Nikmati kenyamanan menginap dengan fasilitas terbaik.</p>
        <button class="btn custom-btn">Read More</button>
    </div>
</section>

<!-- Layanan Kami -->
<section class="services py-5">
    <div class="container">
        <h3 class="text-center mb-4">Temukan Layanan Kami</h3>
        <div class="row">
            <div class="col-md-4 service-card">
                <div class="service-item">
                    <h5>Travel Plan</h5>
                    <p>Jelajahi destinasi Wonosobo dengan nyaman.</p>
                </div>
            </div>
            <div class="col-md-4 service-card">
                <div class="service-item">
                    <h5>Laundry</h5>
                    <p>Nikmati kenyamanan layanan laundry hotel kami.</p>
                </div>
            </div>
            <div class="col-md-4 service-card">
                <div class="service-item">
                    <h5>Pickup Driver</h5>
                    <p>Layanan penjemputan yang nyaman dan aman.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kamar Kami -->
<section class="rooms py-5">
    <div class="container">
        <h3 class="text-center mb-4">Kamar Kami</h3>
        <div class="row">
            <div class="col-md-4 room-card">
                <div class="room-item">
                    <img src="img/single-room.jpg" alt="Single Room">
                    <div class="room-info">Single Room</div>
                </div>
            </div>
            <div class="col-md-4 room-card">
                <div class="room-item">
                    <img src="img/medium-room.jpg" alt="Medium Room">
                    <div class="room-info">Medium Room</div>
                </div>
            </div>
            <div class="col-md-4 room-card">
                <div class="room-item">
                    <img src="img/fighter-room.jpg" alt="Fighter Room">
                    <div class="room-info">Fighter Room</div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
{{-- <script src="script.js"></script> --}}
<script>
    $(document).ready(function () {
        $('.slick-slider').slick({
            autoplay: true,
            autoplaySpeed: 4000,
            arrows: false,
            dots: true,
            fade: true,
            cssEase: 'linear'
        });
    });
</script>
</body>
</html>
