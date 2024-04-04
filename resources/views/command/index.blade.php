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
    <link href="{{asset('css/command.css')}}" rel="stylesheet" />
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    <link href="{{asset('css/card.css')}}" rel="stylesheet" />
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
</head>
<style>
    #big_div {
        background-image: url('{{ asset('assets/images/laura.jpg') }}');
        z-index: 999
    }

    .custom-card {
        /* Add your custom styles here */
        border: 2px solid #ccc;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!"><img width="30%" src="{{ asset('assets/images/logo.jpg') }}" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">

                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="">Home</a></li>
                    @if(Auth::check() && Auth::user()->role == 'admin')
                    <li class="nav-item"><a class="nav-link" href="{{ route('product.index') }}">Dashboard</a></li>
                    @endif


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">All Products</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                            <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                        </ul>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link active custom-btn login-btn" aria-current="page" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active custom-btn register-btn" aria-current="page" href="{{ route('register') }}">Register</a>
                    </li>
                    @endguest


                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn btn-primary" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profile</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><span class="dropdown-item">{{ auth()->user()->name }}</span></li>
                            <li><span class="dropdown-item">{{ auth()->user()->email }}</span></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item btn btn-info">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endauth


                </ul>
                <form id="addToCartForm" class="d-flex">
                    <a href="{{ route('Home.index') }}" class="btn btn-outline-dark">
                        see all products
                    </a>
                </form>

            </div>
        </div>
    </nav>
    <div class="container">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>


    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                @forelse ($commands as $Com)
               
                <br>
                <div class="row p-2 bg-white border rounded">
                    <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="{{ Storage::url($Com->product->image) }}"></div>
                    <div class="col-md-6 mt-1">
                        <h5>{{ $Com->product->name }}</h5>
                        <div class="d-flex flex-row">
                            <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span>310</span>
                        </div>
                        <div class="mt-1 mb-1 spec-1"><span class="dot"></span><span>{{ $Com->product->category->name }}</span></div>
                        <p class="text-justify text-truncate para mb-0"> {{ $Com->product->description }}<br><br></p>
                    </div>
                    <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                        <div class="d-flex flex-row align-items-center">
                            <h4 class="mr-1">{{ $Com->product->price }} $</h4>
                        </div>
                        <h6 class="text-success">{{ $Com->first()->user->name }}</h6>
                        <div class="d-flex flex-column mt-4"><button class="btn btn-outline-success btn-sm mt-2" type="button">Total Commands:</button></div>
                        <form action="{{ route('Commande.destroy', $Com->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="d-flex flex-column mt-4">
                                <button class="btn btn-outline-danger btn-sm mt-2" type="submit">Annuler la commande</button>
                            </div>
                        </form>
                    </div>
                </div>
            @empty
                <div class="alert alert-warning">
                    no commed aw
                </div>
            @endforelse
           
            @if($commands->isNotEmpty())
            <form action="{{ route('striptPayment') }}" method="POST">
                @csrf
                <input type="hidden" name="command_id" value="{{ $commands->first()->id }}">
                <button class="btn mt-5 btn-success" type="submit">Checkout</button>
            </form>
        @endif
            </div>
        </div>
    </div>

    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{asset('js/scripts.js')}}"></script>
    <script src="{{asset('js/AddCart.js')}}"></script>
</body>
</html>
