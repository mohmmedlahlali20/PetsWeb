<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fr9sGS3IQ+2kG4hZf2CvNrTmye51h6b2o3U1bSTYpXNHbd5XSYrxD7MffDuPiNtcXaScBCbCrHezO9/77v3tuw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c0bae2ffa6.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/stylesAdmin.css') }}">
    <title>{{ config('app.name') }} | @yield('title')</title>
</head>
@php
   $usersCount = App\Models\User::count();
   $productsCount = App\Models\Products::count();
   $FoodCount = App\Models\Food::count();
   $AccessoirCount = App\Models\Accessoir::count();
   $CategoryCount = App\Models\Categories::count();
   $CommentCount = App\Models\comments::count();
   $commendsCount = App\Models\commends::count();
   $totalAmountPaid = App\Models\payment::sum('amount');
@endphp
<style>
   

</style>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

        <a class="navbar-brand ps-3" href="{{ route('Home.index') }}">gestion PetsWeb</a>

        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
            <ion-icon name="menu-outline"></ion-icon>
        </button>
      
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{ route('product.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                            aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Gestion Pets
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('Home.index') }}">Home</a>
                                <a class="nav-link" href="{{ route('payment') }}">Payments</a>
                                <a class="nav-link" href="{{ route('get.command') }}">commends</a>
                                <div class="dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" id="navbarDropdown1"
                                        data-bs-toggle="dropdown" aria-expanded="false">Gestion Pets</a>
                                    <ul class="dropdown-menu border rounded mt-2" aria-labelledby="navbarDropdown1">
                                        <li><a class="dropdown-item" href="#!">All Products</a></li>
                                        <li><hr class="dropdown-divider mb-0"></li>
                                        <a class="dropdown-item" href="{{ route('product.create') }}">Add New Products</a>
                                        <a class="dropdown-item" href="{{ route('product.index') }}">Products</a>
                                    </ul>
                                </div>
                                <div class="dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" id="navbarDropdown"
                                        data-bs-toggle="dropdown" aria-expanded="false">Gestion Category</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="#!">All Products</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <a class="dropdown-item" href="{{ route('category.create') }}">Add New Category</a>
                                        <a class="dropdown-item" href="{{ route('category.index') }}">Category</a>
                                    </ul>
                                </div>
                                <div class="dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" id="navbarDropdown"
                                        data-bs-toggle="dropdown" aria-expanded="false">Gestion Food</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="#!">All Products</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <a class="dropdown-item" href="{{ route('create') }}">Foods for Pets</a>
                                        <a class="dropdown-item" href="{{ route('food') }}">Foods </a>
                                    </ul>
                                </div>
                                <div class="dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" id="navbarDropdown"
                                        data-bs-toggle="dropdown" aria-expanded="false">Gestion Users</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="#!">All Products</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <a class="dropdown-item" href="{{ route('user.index') }}">Show Users</a>
                                    </ul>
                                </div>
                                <div class="dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" id="navbarDropdown"
                                        data-bs-toggle="dropdown" aria-expanded="false">Gestion Accessoir</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="{{ route('accessory') }}">All Accessory</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <a class="dropdown-item" href="{{ route('accessoir.name') }}">Add Accessoir</a>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer p-3 border-top mt-5">
                    <div class="small">{{ auth()->user()->role }}:</div>
                    <span class="font-weight-bold">{{ auth()->user()->name }}</span>
                    <span>Contact Support:</span>
                    <a href="mailto:{{ auth()->user()->email }}" class="text-decoration-none text-info">
                        {{ auth()->user()->email }}
                    </a>
                </div>
            </nav>
        </div>
        
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-8 offset-md-2 text-center">
                                <h1 class="display-4 mb-4">Welcome, {{ auth()->user()->name }}</h1>
                                <p class="lead">You have successfully logged into the PetsWEB Admin Dashboard.</p>
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    
                 
                    <div class="row m-3">
                        <div class="col-xl-3 col-md-6 mt-3">
                            <div class="card shadow h-100 py-2 border-left-primary">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Users</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $usersCount }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                               
                                    <a class="small text-primary stretched-link" href="{{ route('user.index') }}"></a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mt-3">
                            <div class="card shadow h-100 py-2 border-left-primary">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pets</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $productsCount }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-paw fa-2x text-gray-300"></i>  
                                        </div>
                                    </div> 
                                </div>
                               
                                    <a class="small text-primary stretched-link" href="{{ route('product.index') }}"></a>
                        
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mt-3">
                            <div class="card shadow h-100 py-2 border-left-primary">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Accessoir</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $AccessoirCount }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                               
                                    <a class="small text-primary stretched-link" href="{{ route('accessory') }}"></a>
                                
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mt-3">
                            <div class="card shadow h-100 py-2 border-left-primary">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Foods</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $FoodCount }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-utensils fa-2x text-gray-300" "></i> 
                                        </div>
                                    </div>
                                </div>
                           
                                    <a class="small text-primary stretched-link" href="#"> </a>
                               
                            </div>
                        </div>    
                        <div class="col-xl-3 col-md-6 mt-3">
                            <div class="card shadow h-100 py-2 border-left-primary">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Price Paid</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAmountPaid }} MAD</div>
                                        </div>
                                        <div class="col-auto">
                                           
                                            <i class="	fa fa-dollar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                <a class="small text-primary stretched-link" href="#"></a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mt-3">
                            <div class="card shadow h-100 py-2 border-left-primary">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Comments</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $CommentCount }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                <a class="small text-primary stretched-link" href=""></a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mt-3">
                            <div class="card shadow h-100 py-2 border-left-primary">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Command</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $commendsCount }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-shopping-bag fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                <a class="small text-primary stretched-link" href="{{ route('get.command') }}"></a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mt-3">
                            <div class="card shadow h-100 py-2 border-left-primary">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Category</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $CategoryCount }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="	fab fa-canadian-maple-leaf fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                <a class="small text-primary stretched-link" href="{{ route('category.index') }}"></a>
                            </div>
                        </div>
                        
                </div>
            </main>
            
            <div class="container">
              
                <div id="notification-container">
                    @if(session('success'))
                    <div id="notification-message" class="notification-message alert alert-success" role="alert">
                        <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                    </div>
                    @endif
                    @if(session('danger'))
                    <div id="notification-message" class="notification-message alert alert-danger" role="alert">
                        <i class="bi bi-exclamation-triangle-fill"></i> {{ session('danger') }}
                    </div>
                    @endif
                </div>

                @if ($errors->any())
                <div  id="" class="alert alert-danger">
                @foreach ($errors->all() as $error)
          
                    <ul>
                        <li>
                            {{ $error }}
                        </li>
                    </ul>
             
                @endforeach
            </div>
            @endif
                

                @yield('content')
                
                
            </div>
            <br>
            <br>
            <br>
 
<footer class="text-center text-lg-start mt-5 bg-dark text-muted">
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">

        <div class="me-5 d-none d-lg-block">
            <span>Get connected with us on social networks:</span>
        </div>

        <div>
            <a href="#" class="me-4 text-reset">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="me-4 text-reset">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="me-4 text-reset">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
    </section>

    <section class="">
        <div class="container text-center text-md-start mt-5">
            <div class="row mt-3">
          
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-4">
         
                    <h6 class="text-uppercase fw-bold mb-4">
                        About Us
                    </h6>
                    <p>
                        Learn more about our mission and vision.
                    </p>
                </div>

                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-4">
                   
                    <h6 class="text-uppercase fw-bold mb-4">
                        Shop
                    </h6>
                    <p>
                        <a href="#" class="text-reset">Dog Supplies</a>
                    </p>
                    <p>
                        <a href="#" class="text-reset">Cat Supplies</a>
                    </p>
                </div>

                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">
                        Support
                    </h6>
                    <p>
                        <a href="#" class="text-reset">FAQs</a>
                    </p>
                    <p>
                        <a href="#" class="text-reset">Contact Us</a>
                    </p>
                </div>
    
            </div>

        </div>
    </section>

    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2024 YourPetStore. All rights reserved.
    </div>

</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('demo/chart-area-demo.js') }}"></script>
    <script src=" {{ asset('demo/chart-bar-demo.js') }}"></script>
    <script src=" {{ asset('demo/chart-pie-demo.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/Admin.js') }}"></script>
</body>

</html>