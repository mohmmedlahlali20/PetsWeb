<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pest Control Home Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/pricings/pricing-2/assets/css/pricing-2.css">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
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

{{-- <section class="position-relative d-flex flex-column justify-content-center align-items-center text-center text-white" style="height: 100vh;">
  <div class="position-absolute top-0 left-0 w-100 h-100 overflow-hidden">
    <video class="w-100 h-100" autoplay muted loop>
      <source src="https://fiverr-res.cloudinary.com/video/upload/t_fiverr_hd/lqzue5xjmctq6pcsgvq1" type="video/mp4">
      
  </video>
  
  </div>
  <div class="video-content space-y-2 position-relative" style="z-index: 10;">
      <h1 class="font-light display-1">Welcome to EVENTO</h1>
      <h3 class="font-light display-4"></h3>
      <p class="font-light fs-5"></p>
  </div>
</section> --}}


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
<div class="container-fluid bg-dark text-light">
  <footer>
      <div class="row my-5 justify-content-center py-5">
          <div class="col-lg-11">
              <div class="row">
                  <div class="col-xl-8 col-md-4 col-sm-4 col-12 my-auto mx-auto">
                      <h3 class="text-muted mb-md-0 mb-5 bold-text">
                          <img src="{{ asset('assets/images/cat1.jpg') }}" alt="" class="rounded-circle" style="width: 100px; height: 100px;">
                      </h3>
                  </div>
                  <div class="col-xl-2 col-md-4 col-sm-4 col-12">
                      <h6 class="mb-3 mb-lg-4 bold-text"><b>MENU</b></h6>
                      <ul class="list-unstyled">
                          <li>Home</li>
                          <li>About</li>
                          <li>Blog</li>
                          <li>Portfolio</li>
                      </ul>
                  </div>
                  <div class="col-xl-2 col-md-4 col-sm-4 col-12">
                      <h6 class="mb-3 mb-lg-4 text-muted bold-text mt-sm-0 mt-5"><b>ADDRESS</b></h6>
                      <p class="mb-1">605, RATAN ICON BUILDING</p>
                      <p>SEAWOODS SECTOR</p>
                  </div>
              </div>
              <div class="row">
                  <div class="col-xl-8 col-md-4 col-sm-4 col-auto my-md-0 mt-5 order-sm-1 order-3 align-self-end">
                      <p class="social text-muted mb-0 pb-0 bold-text">
                          <span class="mx-2"><i class="fa fa-facebook" aria-hidden="true"></i></span>
                          <span class="mx-2"><i class="fa fa-linkedin-square" aria-hidden="true"></i></span>
                          <span class="mx-2"><i class="fa fa-twitter" aria-hidden="true"></i></span>
                          <span class="mx-2"><i class="fa fa-instagram" aria-hidden="true"></i></span>
                      </p>
                      <small class="rights"><span>&#174;</span> Pepper All Rights Reserved.</small>
                  </div>
                  <div class="col-xl-2 col-md-4 col-sm-4 col-auto order-1 align-self-end">
                      <h6 class="mt-55 mt-2 text-muted bold-text"><b>ANIRUDH SINGLA</b></h6>
                      <small><span><i class="fa fa-envelope" aria-hidden="true"></i></span> anirudh@gmail.com</small>
                  </div>
                  <div class="col-xl-2 col-md-4 col-sm-4 col-auto order-2 align-self-end mt-3">
                      <h6 class="text-muted bold-text"><b>RISHABH SHEKHAR</b></h6>
                      <small><span><i class="fa fa-envelope" aria-hidden="true"></i></span> rishab@gmail.com</small>
                  </div>
              </div>
          </div>
      </div>
  </footer>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
