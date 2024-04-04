<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pest Control Home Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom styles */
    .card {
      margin-bottom: 20px;
    }
    /* Hero section styles */
    .hero-section {
      background-color: #f8f9fa; /* Light gray background */
      color: #333; /* Dark text color */
      padding: 100px 0; /* Top and bottom padding */
      text-align: center;
    }
    /* Colors for sections */
    #services, #prices, #sales, #contact {
      background-color: #fff; /* White background for sections */
      color: #333; /* Dark text color */
      padding: 80px 0; /* Top and bottom padding */
    }
    /* Center images */
    .center-image {
      display: flex;
      justify-content: center;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-4 px-lg-5 ">
        <a class="navbar-brand" href="#!">
            <img src="{{ asset('assets/images/logo.jpg') }}" alt="" style="max-width: 30%; border-radius: 30px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('Home.index') }}">Home</a></li>
                <li class="nav-item">
                    <a class="nav-link active custom-btn login-btn" aria-current="page" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active custom-btn register-btn" aria-current="page" href="{{ route('register') }}">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1 class="display-4">Welcome to Pest Control Services</h1>
        <p class="lead">We provide effective pest control solutions for your home or business.</p>
        <p class="lead">Call us at <strong>123-456-7890</strong> for a free consultation!</p>
    </div>
    <div class="center-image">
        <img src="{{ asset('assets/images/kelb.png') }}"  alt="Hero Image" class="img-fluid">
    </div>
</section>

<!-- Services Section -->
<section id="services">
    <div class="container">
        <h2 class="text-center mb-5">Our Services</h2>
        <!-- Service Cards -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Rodent Control</h5>
                        <p class="card-text">We offer professional rodent control services to keep your property rodent-free.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Insect Extermination</h5>
                        <p class="card-text">Our experts are trained to exterminate all types of insects from your home or business.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Termite Treatment</h5>
                        <p class="card-text">We provide effective termite treatment solutions to protect your property from damage.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="center-image">
        <img src="{{ asset('assets/images/kelb.png') }}"  alt="Services Image" class="img-fluid">
    </div>
</section>

<!-- Prices Section -->
<section id="prices">
    <div class="container">
        <h2 class="text-center mb-5">Our Prices</h2>
        <!-- Price Cards -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Standard Package</h5>
                        <p class="card-text">Starting from $99</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Premium Package</h5>
                        <p class="card-text">Starting from $149</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Business Package</h5>
                        <p class="card-text">Starting from $199</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="center-image">
        <img src="{{ asset('assets/images/Home1.png') }}"  alt="Prices Image" class="img-fluid">
    </div>
</section>

<!-- Sales Section -->
<section id="sales">
    <div class="container">
        <h2 class="text-center mb-5">Sales</h2>
        <p class="text-center">Check out our latest sales and promotions!</p>
        <!-- Sale Cards -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Summer Sale</h5>
                        <p class="card-text">Get 20% off on all pest control services this summer.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Holiday Special</h5>
                        <p class="card-text">Special discounts available for holiday bookings.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Refer a Friend</h5>
                        <p class="card-text">Refer a friend and get $50 off on your next service.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="center-image">
        <img src="{{ asset('assets/images/Home.png') }}" width="20%" alt="Sales Image" class="img-fluid">
    </div>
</section>

<!-- Contact Section -->
<section id="contact">
    <div class="container">
        <h2 class="text-center mb-5">Contact Us</h2>
        <div class="row">
            <div class="col-md-6">
                <p>For inquiries and appointments, please contact us:</p>
                <ul>
                    <li>Phone: 123-456-7890</li>
                    <li>Email: info@pestcontrol.com</li>
                    <li>Address: 123 Main Street, Cityville, USA</li>
                </ul>
            </div>
            <div class="col-md-6">
                <!-- Contact Form (You can add your own contact form here) -->
                <form>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Your Email">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" rows="5" placeholder="Your Message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
