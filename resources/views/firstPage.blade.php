<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name')  }} | first page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/pricings/pricing-2/assets/css/pricing-2.css">
  <script src="https://kit.fontawesome.com/c0bae2ffa6.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/firststyle.css') }}">
  <style>
    
    .navbar {
      background-color: #2c3e50; /* Dark blue background */
      padding-top: 20px;
      padding-bottom: 20px;
    }
    .navbar-brand {
      font-weight: bold; /* Bold font for brand */
      color: #fff; /* White text color */
    }
    .navbar-brand:hover {
      color: #f39c12; /* Hover color for brand */
    }
    .navbar-nav .nav-link {
      color: #fff; /* White text color for links */
      padding-left: 20px;
      padding-right: 20px;
    }
    .navbar-nav .nav-link:hover {
      color: #f39c12; /* Hover color for links */
    }
    .navbar-toggler {
      border-color: #fff; /* White border color for toggler */
    }
    .navbar-toggler-icon {
      background-color: #fff; /* White background color for toggler icon */
    }

  </style>
</head>
<body class="bsb-pets">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand mx-auto" href="#">
        <i class="fa fa-paw fa-2x text-gray-300"></i> PETSWEB
    </a>

    <div class="collapse navbar-collapse container" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('Home.index') }}"><i class="fas fa-home"></i> Shop now </a>
            </li>
            @auth
            @if(Auth::user()->role == 'admin')
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('product.index') }}"><i class="fas fa-home"></i> Dashboard </a>
            </li>
            @endif
            @endauth
            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile') }}"><i class="fas fa-images"></i> Profile</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link custom-btn dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-alt fa-lg"></i> {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><span class="dropdown-item"><strong>Email:</strong> {{ auth()->user()->email }}</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item btn btn-outline-danger">
                                <i class="fas fa-sign-out-alt fa-lg"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link custom-btn login-btn" href="{{ route('login') }}"><i
                        class="fas fa-sign-in-alt fa-lg"></i> Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link custom-btn register-btn" href="{{ route('register') }}"><i
                        class="fas fa-user-plus fa-lg"></i> Register</a>
            </li>
            @endguest
        </ul>
    </div>

    <ul class="navbar-nav  ">
        <div class="d-flex align-items-center">
            <li class="nav-item">
                <a class="nav-link" href="#" title="Facebook"><i class="fab fa-facebook-f fa-2x"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" title="Twitter"><i class="fab fa-twitter fa-2x"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" title="Gmail"><i class="far fa-envelope fa-2x"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" title="Instagram"><i class="fab fa-instagram fa-2x"></i></a>
            </li>
        </div>
    </ul>
</nav>

 


  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-th-large"></i> Panel Title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Panel Content
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
          <button type="button" class="btn btn-primary"><i class="fas fa-save"></i> Save changes</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Button for panel -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Panel Title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Panel Content
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <section class="about-petsweb">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex justify-content-center align-items-center">
          <figure>
            <img src="{{ asset('assets/images/HomePage2.jpeg') }}" class="testimonial-image" alt="A happy pet">
          </figure>
        </div>
        <div class="col-lg-6 d-flex justify-content-center bg-light align-items-center">
          <div class="quote-wrapper">
            <h2 class="align-self-center text-center">About PetsWeb</h2>
            <p class="text-center text-lg-start">PetsWeb is an innovative platform dedicated to providing comprehensive solutions for pet owners and pet enthusiasts. Our mission is to enhance the well-being of pets and strengthen the bond between humans and their furry companions.</p>
            <p class="text-center text-lg-start">With PetsWeb, you can discover a wide range of resources, including articles on pet care, training tips, product reviews, and community forums where you can connect with other pet lovers. Whether you're a new pet parent or an experienced enthusiast, PetsWeb has something for everyone.</p>
            <p class="text-center text-lg-start">Join us in our mission to create a world where every pet is happy, healthy, and loved. Explore PetsWeb today and embark on a journey of joy and companionship with your beloved pets!</p>
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
            </header>
        </div>
    </div>


      <div class="row">
          <div class="col-lg-6 mx-auto">

              <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                <div class="blockquote-custom-icon bg-info shadow-sm"><i class="fa fa-paw text-white"></i></div>
                <p class="mb-0 mt-2 font-italic">"Pets leave paw prints on our hearts, forever and always. They're not just animals; they're family."</p>
                <footer class="blockquote-footer pt-4 mt-4 border-top">Unknown</footer>
            </blockquote>

          </div>
      </div>
  </div>
</section>

<section class="faq-section">
  <div class="container">
      <h2 class="text-center">Frequently Asked Questions</h2>
      <div class="row">
          <div class="col-lg-4 ">
              <div class="card" style="width: 25rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <img src="{{ asset('assets/images/HomePage7.jpeg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">How do I get started with your product?</h5>
                  <p class="card-text">Nullam vel mauris sit amet neque ultricies varius. Nulla facilisi. Vestibulum auctor urna nec tellus aliquet, nec pulvinar metus convallis.</p>
                </div>
              </div>
          </div>
           
              <div class="col-lg-4 ">
                <div class="card" style="width: 25rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                  <img src="{{ asset('assets/images/HomePage8.jpeg') }}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">How do I get started with your product?</h5>
                    <p class="card-text">Nullam vel mauris sit amet neque ultricies varius. Nulla facilisi. Vestibulum auctor urna nec tellus aliquet, nec pulvinar metus convallis.</p>
                  </div>
                </div>
            </div>
         
           
            <div class="col-lg-4 ">
              <div class="card" style="width: 25rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <img src="{{ asset('assets/images/HomePage9.jpeg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">How can I contact support?</h5>
                  <p class="card-text">Nullam vel mauris sit amet neque ultricies varius. Nulla facilisi. Vestibulum auctor urna nec tellus aliquet, nec pulvinar metus convallis.</p>
                </div>
           </div>
        </div>
      </div>
  </div>
</section>
<section class="board-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="board-item" id="users">
          <img src="{{ asset('assets/images/HomePage11.jpeg') }}" class="img-fluid board-image" alt="Users Image">
          <span class="count">0</span>
          <p>Users</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="board-item" id="pets">
          <img src="{{ asset('assets/images/HomePage10.jpeg') }}" class="img-fluid board-image" alt="Pets Image">
          <span class="count">0</span>
          <p>Pets</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="board-item" id="searching">
          <img src="{{ asset('assets/images/HomePage7.jpeg') }}" class="img-fluid board-image" alt="Searching Image">
          <span class="count">0</span>
          <p>Pets Searching</p>
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









          

<!-- Sales Section -->

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
  
<script>
  // JavaScript code for animating the counts
document.addEventListener('DOMContentLoaded', function() {
  const usersCount = document.getElementById('users').querySelector('.count');
  const petsCount = document.getElementById('pets').querySelector('.count');
  const searchingCount = document.getElementById('searching').querySelector('.count');

  // Start the counts animation
  animateCount(usersCount, 0, 500, 1500);
  animateCount(petsCount, 0, 1000, 1500);
  animateCount(searchingCount, 0, 500, 1500);

  function animateCount(element, start, end, duration) {
    let current = start;
    const increment = end > start ? 1 : -1;
    const stepTime = Math.abs(Math.floor(duration / (end - start)));
    const timer = setInterval(function() {
      current += increment;
      element.textContent = current;
      if (current === end) {
        clearInterval(timer);
      }
    }, stepTime);
  }
});

</script>

<!-- Bootstrap Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="{{ asset('js/firstscript.js') }}"></script>
</body>
</html>
