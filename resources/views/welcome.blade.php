<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ config('app.name')  }} </title>

    <link rel="icon" type="image/x-icon" href="{{asset('assets/favicon.ico')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/c0bae2ffa6.js" crossorigin="anonymous"></script>

    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    <link href="{{asset('css/card.css')}}" rel="stylesheet" />
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
</head>
<style>
body {
    overflow-x: hidden;
}
    .custom-card {
    /* Add your custom styles here */
    border: 2px solid #ccc;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}
.btn-icon {
    display: flex;
    align-items: center;
}
.btn-icon a {
    flex: 1;
}
.btn-icon i {
    margin-right: 5px; 
}

</style>

<body style="">
    <nav class="navbar navbar-expand-lg navbar-light bg-silver">
                <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!"><img width="30%" src="{{ asset('assets/images/logo.jpg') }}" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">

                      <li class="nav-item"><a class="nav-link active" aria-current="page" href=""><i class="fas fa--in-alt">Home</i></a></li>
                      @if(Auth::check() && Auth::user()->role == 'admin')
                      <li class="nav-item"><a class="nav-link" href="{{ route('product.index') }}">Dashboard</a></li>
                      @endif
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-cat	"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="#!">Contact Admin</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/chatify') }}">Chat</a>
                            </li>
                        </ul>
                    </li>
                    
                    @guest
                    <li class="nav-item">
                        <a class="nav-link active custom-btn login-btn" aria-current="page" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"> login</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active custom-btn register-btn" aria-current="page" href="{{ route('register') }}"><i class="fas fa--in-alt">register</i></a>
                    </li>
                    @endguest
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="	fas fa-user-alt"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><span class="dropdown-item">{{ auth()->user()->name }}</span></li>
                            <li><span class="dropdown-item">{{ auth()->user()->email }}</span></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item btn btn-info"><i class="fas fa-in-alt">Log out</i></button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
                </ul>
                <form action=""  class="d-flex">
                  <a id="" class="btn btn-outline-dark"  href="{{ route('Commandes.index') }}">
                      <i class="bi-cart-fill me-1"></i>
                     My Cards ({{ $userCommandCount }})
                  </a>
              </form>
            </div>
        </div>
    </nav>
<br>
<form method="get">
    <div id="big_div" class="container">
        <div class="search">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="bx bxs-map"></i></span>
                        <input type="search" class="form-control" name="query" placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


    <section class="cat_product_area section_gap ">
      <div class="row flex-row-reverse">
        <div id="notification-container">
            @if(session('success'))
                <div id="notification-message" class="notification-message">{{ session('success') }}</div>
            @endif
            @if(session('danger'))
            <div id="notification-message" class="notification-message">{{ session('success') }}</div>
            @endif
        </div>
        <div class="col-lg-9">  
            @if (isset($products ))
            <x-pets :products="$products" />
            @elseif (isset($Foods))
            <x-food :Food="$Foods"/>
            @elseif(isset($Accessoir))
            <x-accessoir :Accessoir="$Accessoir"/>
            @endif
          </div>
          <div class="col-lg-2">
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
                        <form action=""  id="filterForm" method="GET">
                            @csrf
                            <ul class="list-group">
                                @forelse ($categories as $cat)
                                <li class="list-group-item">
                                    <input type="radio" value="{{ $cat->id }}" id="category_{{ $cat->id }}" name="category[]" class="form-check-input">
                                    <label for="category_{{ $cat->id }}" class="form-check-label">{{ $cat->name }}</label>
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
                                    <option value="male" {{ request('sex') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ request('sex') == 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">Age:</label>
                                <select class="form-select" id="age" name="age">
                                    <option value="">All</option>
                                    <option value="2-6" {{ request('age') == '2-6' ? 'selected' : '' }}>2-6 years</option>
                                    <option value="7-10" {{ request('age') == '7-10' ? 'selected' : '' }}>7-10 years</option>
                                    <option value="10+" {{ request('age') == '10+' ? 'selected' : '' }}>Over 10 years</option>
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
                            <small><span><i class="fa fa-envelope" aria-hidden="true"></i></span> mohamemd@PEts.web</small>
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
    <script>

    </script>
    
    
    
    
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{asset('js/scripts.js')}}"></script>
    <script src="{{asset('js/AddCart.js')}}"></script>

</body>
</html>
