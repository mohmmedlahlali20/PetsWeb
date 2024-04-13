<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pest Control Home Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/pricings/pricing-2/assets/css/pricing-2.css">
  <script src="https://kit.fontawesome.com/c0bae2ffa6.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/firststyle.css') }}">
  <style>
  .rbg {
    background-color: rgba(208, 245, 217, 0.9); /* Adjust the alpha value (0.9 in this case) to change the opacity */
  }
  
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
<body class="bsb-pets">

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/images/logo.jpg') }}" alt="" style="max-width: 30%; border-radius: 30px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('Home.index') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Contact</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">About</a></li>
                @auth
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Upgrade Your Account</a></li>
                @endauth
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

<section class="testimonial">
  <div class="container">
      <div class="row">
          <div class="col-lg-6 d-none d-lg-block">
              <ol class="carousel-indicators tabs">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                      <figure>
                          <img src="{{ asset('assets/images/arnab1.jpg') }}" class="img-fluid rounded-circle" alt="A happy pet">
                      </figure>
                  </li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1">
                      <figure>
                          <img src="{{ asset('assets/images/arnab1.jpg') }}" class="img-fluid rounded-circle" alt="Another happy pet">
                      </figure>
                  </li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2">
                      <figure>
                          <img src="{{ asset('assets/images/arnab1.jpg') }}" class="img-fluid rounded-circle" alt="Yet another happy pet">
                      </figure>
                  </li>
              </ol>
          </div>
          <div class="col-lg-6 d-flex justify-content-center align-items-center">
              <div id="carouselExampleIndicators" data-interval="false" class="carousel slide" data-ride="carousel">
                  <h3>WHAT OUR CLIENTS SAY</h3>
                  <h1>TESTIMONIALS</h1>
                  <div class="carousel-inner">
                      <div class="carousel-item active">
                          <div class="quote-wrapper">
                              <p>Les Pets has been a game-changer for my furry friend! Their dedication to providing healthy and delicious pet food has made a noticeable difference in my pet's energy and overall well-being. I highly recommend Les Pets to all pet owners!</p>
                              <h3>Jennifer Smith</h3>
                          </div>
                      </div>
                      <div class="carousel-item">
                          <div class="quote-wrapper">
                              <p>Since switching to Les Pets, my pet has never been happier! The quality of their food and the care they put into every meal is evident. I'm so grateful to have found a company that prioritizes the health and happiness of pets.</p>
                              <h3>Michael Johnson</h3>
                          </div>
                      </div>
                      <div class="carousel-item">
                          <div class="quote-wrapper">
                              <p>Les Pets goes above and beyond to ensure my pet receives the nutrition they need. Their commitment to quality and their love for animals shines through in every meal. Thank you, Les Pets, for making a difference in my pet's life!</p>
                              <h3>Emily Rodriguez</h3>
                              
                          </div>
                      </div>
                  </div>
                  <button class="btn btn-info "> Book now</button>
                  <ol class="carousel-indicators indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
              </div>
          </div>
      </div>
  </div>
</section>


<section class="py-5">
  <div class="container">
      
      <div class="row">
        <div class="col-lg-6 mx-auto">
            <header class="text-center pb-5">
                <h1 class="h2">PetsWeb</h1>
                <p>Find motivation and joy in the company of your beloved pets.</p>
            </header>Age
        </div>
    </div>


      <div class="row">
          <div class="col-lg-6 mx-auto">

              <!-- CUSTOM BLOCKQUOTE -->
              <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                <div class="blockquote-custom-icon bg-info shadow-sm"><i class="fa fa-paw text-white"></i></div>
                <p class="mb-0 mt-2 font-italic">"Pets leave paw prints on our hearts, forever and always. They're not just animals; they're family."</p>
                <footer class="blockquote-footer pt-4 mt-4 border-top">Unknown</footer>
            </blockquote>

          </div>
      </div>
  </div>
</section>
<!-- Pets Section -->
<section class="bsb-pets bg-light py-5 py-xl-8">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
        <h3 class="fs-6 text-secondary mb-2 text-uppercase text-center">Meet Our Memes</h3>
        <h2 class="display-5 mb-4 mb-md-5 text-center">Our adorable memes waiting for you!</h2>
        <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row gy-5 gy-lg-0 gx-xl-5">
      <div class="col-12 col-lg-4">
        <div class="card border-0 border-bottom border-primary shadow-sm">
          <img src="{{ asset('assets/images/OIG3.jpeg') }}" class="card-img-top" alt="Pet 1">
          <div class="card-body p-4 p-xxl-5">
            <h5 class="card-title mb-3">Programming Panda</h5>
            <p class="card-text">This panda loves coding and debugging!</p>
            <a href="#!" class="btn bsb-btn-xl btn-primary rounded-pill">Share Now</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="card border-0 border-bottom border-primary shadow-lg">
          <img src="{{ asset('assets/images/OIG2.jpeg') }}" class="card-img-top" alt="Pet 1">
          <div class="card-body p-4 p-xxl-5">
            <h5 class="card-title mb-3">Meme Doggo</h5>
            <p class="card-text">This doggo fetches memes faster than balls!</p>
            <a href="#!" class="btn bsb-btn-xl btn-primary rounded-pill">Share Now</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="card border-0 border-bottom border-primary shadow-sm">
          <img src="{{ asset('assets/images/OIG4.jpeg') }}" class="card-img-top" alt="Pet 1">
          <div class="card-body p-4 p-xxl-5">
            <h5 class="card-title mb-3">Cute Coder Cat</h5>
            <p class="card-text">This cat writes purr-fect code!</p>
            <a href="#!" class="btn bsb-btn-xl btn-primary rounded-pill">Share Now</a>
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
        <h3 class="fs-6 text-secondary mb-2 text-uppercase text-center">Our Pet Packages</h3>
        <h2 class="display-5 mb-4 mb-md-5 text-center">Discover our premium and VIP plans for your furry friends.</h2>
        <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row gy-5 gy-lg-0 gx-xl-5">
      <div class="col-12 col-lg-4">
        <div class="card border-0 border-bottom border-primary shadow-sm">
          <div class="card-body p-4 p-xxl-5">
            <h2 class="h4 mb-2">Premium</h2>
            <h4 class="display-3 fw-bold text-primary mb-0">$75</h4>
            <p class="text-secondary mb-4">USD / Month</p>
            <ul class="list-group list-group-flush mb-4">
              <li class="list-group-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                </svg>
                <span><strong>10</strong> Grooming Sessions</span>
              </li>
              <li class="list-group-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                </svg>
                <span><strong>200</strong> Treats</span>
              </li>
              <li class="list-group-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                </svg>
                <span><strong>50 lbs</strong> of Premium Food</span>
              </li>
              <li class="list-group-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                </svg>
                <span>Free <strong>Toy</strong></span>
              </li>
              <li class="list-group-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                </svg>
                <span><strong>Bi-weekly</strong> Vet Check</span>
              </li>
            </ul>
            <a href="#!" class="btn bsb-btn-xl btn-primary rounded-pill">Choose Plan</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="card border-0 border-bottom border-primary shadow-sm">
          <div class="card-body p-4 p-xxl-5">
            <h2 class="h4 mb-2">VIP</h2>
            <h4 class="display-3 fw-bold text-primary mb-0">$90 </h4>
            <p class="text-secondary mb-4">USD / Month</p>
            <ul class="list-group list-group-flush mb-4">
              <li class="list-group-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                </svg>
                <span><strong>10</strong> Grooming Sessions</span>
              </li>
              <li class="list-group-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                </svg>
                <span><strong>200</strong> Treats</span>
              </li>
              <li class="list-group-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                </svg>
                <span><strong>50 lbs</strong> of Premium Food</span>
              </li>
              <li class="list-group-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                </svg>
                <span>Free <strong>Toy</strong></span>
              </li>
              <li class="list-group-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                </svg>
                <span><strong>Bi-weekly</strong> Vet Check</span>
              </li>
            </ul>
            <a href="#!" class="btn bsb-btn-xl btn-primary rounded-pill">Choose Plan</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="card border-0 border-bottom border-primary shadow-sm">
          <div class="card-body p-4 p-xxl-5">
            <h2 class="h4 mb-2">Premium</h2>
            <h4 class="display-3 fw-bold text-primary mb-0">$75</h4>
            <p class="text-secondary mb-4">USD / Month</p>
            <ul class="list-group list-group-flush mb-4">
              <li class="list-group-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                </svg>
                <span><strong>10</strong> Grooming Sessions</span>
              </li>
              <li class="list-group-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                </svg>
                <span><strong>200</strong> Treats</span>
              </li>
              <li class="list-group-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                </svg>
                <span><strong>50 lbs</strong> of Premium Food</span>
              </li>
              <li class="list-group-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                </svg>
                <span>Free <strong>Toy</strong></span>
              </li>
              <li class="list-group-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                </svg>
                <span><strong>Bi-weekly</strong> Vet Check</span>
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
        <img src="{{ asset('assets/images/OIG1.jpeg') }}" width="20%" alt="Sales Image" class="img-fluid">
    </div>
  </section>
  <div class="container-fluid  text-light rbg">
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
                        <h6 class="mb-3 mb-lg-4 bold-text text-dark"><b>MENU</b></h6>
                        <ul class="list-unstyled text-dark">
                            <li>Home</li>
                            <li>About</li>
                            <li>Blog</li>
                            <li>Portfolio</li>
                        </ul>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-4 col-12">
                        <h6 class="mb-3 mb-lg-4 text-muted bold-text mt-sm-0 mt-5"><b>ADDRESS</b></h6>
                        <p class="mb-1 text-dark">605, RATAN ICON BUILDING</p>
                        <p class="text-dark">SEAWOODS SECTOR</p>
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
                        <small class="rights text-dark"><span>&#174;</span> Pepper All Rights Reserved.</small>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-4 col-auto order-1 align-self-end">
                        <h6 class="mt-55 mt-2 text-muted bold-text text-dark"><b>ANIRUDH SINGLA</b></h6>
                        <small><span><i class="fa fa-envelope" aria-hidden="true"></i></span> <span class="text-dark">anirudh@gmail.com</span></small>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-4 col-auto order-2 align-self-end mt-3">
                        <h6 class="text-muted bold-text text-dark"><b>RISHABH SHEKHAR</b></h6>
                        <small><span><i class="fa fa-envelope" aria-hidden="true"></i></span> <span class="text-dark">rishab@gmail.com</span></small>
                    </div>
                </div>
            </div>
        </div>
    </footer>
  </div>
  


<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="{{ asset('js/firstscript.js') }}"></script>
</body>
</html>
