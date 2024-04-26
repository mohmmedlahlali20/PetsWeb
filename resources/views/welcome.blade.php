<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
 

    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ config('app.name') }} </title>

    <link rel="icon" type="image/x-icon" href="{{asset('assets/favicon.ico')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/c0bae2ffa6.js" crossorigin="anonymous"></script>

    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    <link href="{{asset('css/card.css')}}" rel="stylesheet" />
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
</head>
<style>

</style>

<body class="bg-bady">
    {{-- <nav class="navbar navbar-expand-lg navbar-light rbg-nav">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assets/images/logo.jpg" alt="PetsWeb Logo" class="logo" style="max-height: 40px;">
                PetsWeb
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @auth
                    @if(Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a class="nav-link custom-btn" href="{{ route('product.index') }}">Dashboard</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item">
                        <a class="nav-link custom-btn login-btn" href="{{ route('login') }}"><i
                                class="fas fa-sign-in-alt fa-lg"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link custom-btn register-btn" href="{{ route('register') }}"><i
                                class="fas fa-user-plus fa-lg"></i> Register</a>
                    </li>
                    @endauth
                    <li class="nav-item">
                        <form action="{{ route('Commandes.index') }}" method="GET">
                            <button type="submit" class="btn custom-btn">
                                <i class="bi-cart-fill fa-lg me-1"></i>
                                My Orders ({{ $userCommandCount }})
                            </button>
                        </form>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link custom-btn" href="#"><i class="fab fa-facebook fa-lg"></i></a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link custom-btn" href="#"><i class="fas fa-envelope-square fa-lg"></i></a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link custom-btn" href="#"><i class="fab fa-twitter fa-lg"></i></a>
                    </li>
                    <li class="nav-item dropdown">
                        @auth
                        <a class="nav-link custom-btn dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-alt fa-lg"></i> {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><span class="dropdown-item"><strong>Email:</strong> {{ auth()->user()->email }}</span></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item btn btn-outline-danger">
                                        <i class="fas fa-sign-out-alt fa-lg"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav> --}}
    <nav class="navbar navbar-expand-lg ">
      <div class="container container-fluid">
          <a class="navbar-brand" href="{{ route('firstPage') }}"><i class="fas fa-home"></i> PETSWEB</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              <span class="navbar-toggler-icon"></span>
              <span class="navbar-toggler-icon"></span>
          </button>
  
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                      <a class="nav-link" href="#"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
                  </li>
                  @auth
                  @if(Auth::user()->role == 'admin')
                  <li class="nav-item active">
                      <a class="nav-link" href="{{ route('product.index') }}"><i class="fas fa-home"></i> Dashboard <span class="sr-only">(current)</span></a>
                  </li>
                  @endif
                  @endauth
                  @auth
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('profile') }}"><i class="fas fa-images"></i> Profile</a>
                  </li>
                  <li class="nav-item">
                      <form action="{{ route('Commandes.index') }}" method="GET">
                          <button type="submit" class="btn custom-btn">
                              <i class="bi-cart-fill fa-lg me-1"></i>
                              My Orders ({{ $userCommandCount }})
                          </button>
                      </form>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link custom-btn dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-user-alt fa-lg"></i> {{ auth()->user()->name }}
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                          <li><span class="dropdown-item"><strong>Email:</strong> {{ auth()->user()->email }}</span></li>
                          <li><hr class="dropdown-divider"></li>
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
                      <a class="nav-link custom-btn login-btn" href="{{ route('login') }}"><i class="fas fa-sign-in-alt fa-lg"></i> Login</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link custom-btn register-btn" href="{{ route('register') }}"><i class="fas fa-user-plus fa-lg"></i> Register</a>
                  </li>
                  @endguest
              </ul>
          </div>
  
          <!-- Social media icons -->
          <ul class="navbar-nav ml-auto">
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
      </div>
  </nav>
  
      <br>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="g p-4 border rounded-5">
              <h3 class="text-center">Welcome to PetsWeb</h3>
              <p class="text-center">Here you can find all the pets you need, with the best quality and prices.</p>
              <form class="d-flex" method="get">
                <div class="input-group">
                  <span class="input-group-prepend"><i class="bx bxs-map"></i></span>
                  <input type="search" class="form-control" name="query" placeholder="Search">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Search</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      
   

    <section class="cat_product_area section_gap ">
        <div class="row flex-row-reverse">
            <div id="notification-container">
                @if(session('success'))
                <div id="notification-message" class="notification-message success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
                @endif
                @if(session('danger'))
                <div id="notification-message" class="notification-message danger">
                    <i class="fas fa-exclamation-circle"></i> {{ session('danger') }}
                </div>
                @endif
            </div>
            <div class="col-lg-9">
                @if (isset($products ))
                <x-pets :products="$products" />
                @elseif (isset($Foods))
                <x-food :Food="$Foods" />
                @elseif(isset($Accessoir))
                <x-accessoir :Accessoir="$Accessoir" />
                @endif
            </div>
            <div class="col-lg-2 bg-b">
                <div class="left_sidebar_area">
                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3 class="m-3">Autre service</h3>
                        </div>

                        <div class="d-grid gap-1 container">
                            <div class="btn-icon">
                                <a class="btn btn-primary" href="{{ route('Home.index') }}">
                                    <i class="fas fa-dog material-icons"></i> Pets
                                </a>
                            </div>
                            <div class="btn-icon">
                                <a class="btn btn-primary" href="{{ route('accessoir.index') }}">
                                    <i class="fas fa-shopping-bag material-icons"></i> Accessories
                                </a>
                            </div>
                            <div class="btn-icon">
                                <a class="btn btn-primary" href="{{ route('Food.index') }}">
                                    <i class="fas fa-utensils material-icons"></i> Foods
                                </a>
                            </div>
                        </div>
                        <hr>
                        <div class="l_w_title">
                            <h3>Browse Categories</h3>
                        </div>
                        <div class="widgets_inner">
                            <form action="" id="filterForm" method="GET">
                                @csrf
                                <ul class="list-group">
                                    @forelse ($categories as $cat)
                                    <li class="list-group-item">
                                        <input type="radio" value="{{ $cat->id }}" id="category_{{ $cat->id }}" name="category[]" class="form-check-input">
                                        <label for="category_{{ $cat->id }}" class="form-check-label">{{ $cat->name
                                            }}</label>
                                    </li>
                                    @empty
                                    <li class="list-group-item">
                                        <div class="alert alert-warning">
                                            No categories exist.
                                        </div>
                                    </li>
                                    @endforelse
                                </ul>
                                <hr>
                                <div class="mb-3">
                                    <label for="sex" class="form-label">Sex:</label>
                                    <select class="form-select" id="sex" name="sex">
                                        <option value="">All</option>
                                        <option value="male" {{ request('sex')=='male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="female" {{ request('sex')=='female' ? 'selected' : '' }}>Female
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="age" class="form-label">Age:</label>
                                    <select class="form-select" id="age" name="age">
                                        <option value="">All</option>
                                        <option value="2-6" {{ request('age')=='2-6' ? 'selected' : '' }}>2-6 years
                                        </option>
                                        <option value="7-10" {{ request('age')=='7-10' ? 'selected' : '' }}>7-10 years
                                        </option>
                                        <option value="10+" {{ request('age')=='10+' ? 'selected' : '' }}>Over 10 years
                                        </option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </form>
                        </div>
                    </aside>
                </div>
            </div>

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
                            <small><span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                mohamemd@PEts.web</small>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-4 col-auto order-2 align-self-end mt-3">
                            <h6 class="text-muted bold-text"><b>RISHABH SHEKHAR</b></h6>
                            <small><span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                rishab@gmail.com</small>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>



    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{asset('js/scripts.js')}}"></script>
    <script src="{{asset('js/AddCart.js')}}"></script>

</body>

</html>
