<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pest Control Home Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/pricings/pricing-2/assets/css/pricing-2.css">

  <style>
    .card {
      margin-bottom: 20px;
    }

    .hero-section {
      background-image: url('{{ asset('assets/images/image.png') }}');
      color: #333; 
      padding: 100px 0; 
      text-align: center;
    }
    #services, #prices, #sales, #contact {
      background-color: #fff; 
      color: #333; 
      padding: 80px 0; 
    }

    .center-image {
      display: flex;
      justify-content: center;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-4 px-lg-5  ">
        <a class="navbar-brand" href="#!">
            <img src="{{ asset('assets/images/logo.jpg') }}" alt=""  style="max-width: 30%; border-radius: 30px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('Home.index') }}">Home</a></li>
                @guest
                <li class="nav-item">
                    <a class="nav-link active custom-btn login-btn" aria-current="page" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active custom-btn register-btn" aria-current="page" href="{{ route('register') }}">Register</a>
                </li>
                @endguest
               
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-success text-center text-md-start"> <!-- Adjust text alignment for different screen sizes -->
                <h1 class="display-3  font-bold">Welcome to Pest Control Services</h1>
                <p class="h4">We provide effective pest control solutions for your home or business.</p>
                <p class="h4">Call us at <strong>123-456-7890</strong> for a free consultation!</p>
            </div>
            <div class="col-md-6">
                <div class="center-image mt-md-0 mt-4 text-center text-md-end"> <!-- Adjust image alignment for different screen sizes -->
                    <img src="{{ asset('assets/images/Home1.png') }}" alt="Hero Image" class="img-fluid">
                </div>
            </div>
        </div>
        
        </div>
    </div>
</section>

<!-- Pets Section -->
<section class="bsb-pets bg-light py-5 py-xl-8">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
          <h3 class="fs-6 text-secondary mb-2 text-uppercase text-center">Meet Our Pets</h3>
          <h2 class="display-5 mb-4 mb-md-5 text-center">Our adorable pets waiting for you!</h2>
          <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
        </div>
      </div>
    </div>
  
    <div class="container">
      <div class="row gy-5 gy-lg-0 gx-xl-5">
        <div class="col-12 col-lg-4">
          <div class="card border-0 border-bottom border-primary shadow-sm">
            <img src="{{ asset('assets/images/cat1.jpg') }}" class="card-img-top" alt="Pet 1">
            <div class="card-body p-4 p-xxl-5">
              <h5 class="card-title mb-3">Fluffy</h5>
              <p class="card-text">Fluffy is a playful cat who loves cuddles and attention.</p>
              <a href="#!" class="btn bsb-btn-xl btn-primary rounded-pill">Adopt Now</a>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-4">
          <div class="card border-0 border-bottom border-primary shadow-lg">
            <img src="{{ asset('assets/images/image copy 3.png') }}" class="card-img-top" alt="Pet 2">
            <div class="card-body p-4 p-xxl-5">
              <h5 class="card-title mb-3">Buddy</h5>
              <p class="card-text">Buddy is a loyal dog who enjoys long walks and playing fetch.</p>
              <a href="#!" class="btn bsb-btn-xl btn-primary rounded-pill">Adopt Now</a>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-4">
          <div class="card border-0 border-bottom border-primary shadow-sm">
            <img src="{{ asset('assets/images/image copy 4.png') }}" class="card-img-top" alt="Pet 3">
            <div class="card-body p-4 p-xxl-5">
              <h5 class="card-title mb-3">Whiskers</h5>
              <p class="card-text">Whiskers is a friendly rabbit who loves munching on carrots and exploring.</p>
              <a href="#!" class="btn bsb-btn-xl btn-primary rounded-pill">Adopt Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="bsb-pricing-2 bg-light py-5 py-xl-8">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
          <h3 class="fs-6 text-secondary mb-2 text-uppercase text-center">Our Pricing</h3>
          <h2 class="display-5 mb-4 mb-md-5 text-center">We offer great pricing plans for everyone.</h2>
          <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
        </div>
      </div>
    </div>
  
    <div class="container">
      <div class="row gy-5 gy-lg-0 gx-xl-5">
        <div class="col-12 col-lg-4">
          <div class="card border-0 border-bottom border-primary shadow-sm">
            <div class="card-body p-4 p-xxl-5">
              <h2 class="h4 mb-2">Starter</h2>
              <h4 class="display-3 fw-bold text-primary mb-0">$45</h4>
              <p class="text-secondary mb-4">USD / Month</p>
              <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                  </svg>
                  <span><strong>5</strong> Bootstrap Install</span>
                </li>
                <li class="list-group-item">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                  </svg>
                  <span><strong>100,000</strong> Visits</span>
                </li>
                <li class="list-group-item">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                  </svg>
                  <span><strong>30 GB</strong> Disk Space</span>
                </li>
                <li class="list-group-item">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x text-danger" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                  </svg>
                  <span>Free <strong>SSL and CDN</strong></span>
                </li>
                <li class="list-group-item">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x text-danger" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                  </svg>
                  <span>Free <strong>Support</strong></span>
                </li>
                <li class="list-group-item">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x text-danger" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                  </svg>
                  <span><strong>Weekly</strong> Reports</span>
                </li>
              </ul>
              <a href="#!" class="btn bsb-btn-xl btn-primary rounded-pill">Choose Plan</a>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-4">
          <div class="card border-0 border-bottom border-primary shadow-lg pt-md-4 pb-md-4 bsb-pricing-popular">
            <div class="card-body p-4 p-xxl-5">
              <h2 class="h4 mb-2">Pro</h2>
              <h4 class="display-3 fw-bold text-primary mb-0">$75</h4>
              <p class="text-secondary mb-4">USD / Month</p>
              <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                  </svg>
                  <span><strong>20</strong> Bootstrap Install</span>
                </li>
                <li class="list-group-item">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                  </svg>
                  <span><strong>250,000</strong> Visits</span>
                </li>
                <li class="list-group-item">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                  </svg>
                  <span><strong>50 GB</strong> Disk Space</span>
                </li>
                <li class="list-group-item">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                  </svg>
                  <span>Free <strong>SSL and CDN</strong></span>
                </li>
                <li class="list-group-item">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                  </svg>
                  <span>Free <strong>Support</strong></span>
                </li>
                <li class="list-group-item">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x text-danger" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                  </svg>
                  <span><strong>Weekly</strong> Reports</span>
                </li>
              </ul>
              <a href="#!" class="btn bsb-btn-xl btn-primary rounded-pill">Choose Plan</a>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-4">
          <div class="card border-0 border-bottom border-primary shadow-sm">
            <div class="card-body p-4 p-xxl-5">
              <h2 class="h4 mb-2">Business</h2>
              <h4 class="display-3 fw-bold text-primary mb-0">$125</h4>
              <p class="text-secondary mb-4">USD / Month</p>
              <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                  </svg>
                  <span><strong>50</strong> Bootstrap Install</span>
                </li>
                <li class="list-group-item">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                  </svg>
                  <span><strong>400,000</strong> Visits</span>
                </li>
                <li class="list-group-item">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                  </svg>
                  <span><strong>100 GB</strong> Disk Space</span>
                </li>
                <li class="list-group-item">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                  </svg>
                  <span>Free <strong>SSL and CDN</strong></span>
                </li>
                <li class="list-group-item">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                  </svg>
                  <span>Free <strong>Support</strong></span>
                </li>
                <li class="list-group-item">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                  </svg>
                  <span><strong>Weekly</strong> Reports</span>
                </li>
              </ul>
              <a href="#!" class="btn bsb-btn-xl btn-primary rounded-pill">Choose Plan</a>
            </div>
          </div>
        </div>
      </div>
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
