
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
  body{
	background-color: #eee;
}

.address-line{
	color: #4C40E0;
    font-size: 11px;
    font-weight: 700;
}
   .rbg-nav{
    background-color: rgba(152, 236, 229, 0.5);

}
    .custom-card {
        border: 2px solid #ccc;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light rbg-nav">
        <div class="container">
            <a class="navbar-brand" href="{{ route('Home.index') }}">
                <img src="assets/images/logo.jpg" alt="Logo" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex" method="get">
                    <span class="input-group-addon"><i class="bx bxs-map"></i></span>
                    <input type="search" class="form-control" name="query" placeholder="Search">
                    &nbsp;
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-2">
                    @auth
                    @if(Auth::user()->role == 'admin')
                    <li class="nav-item ms-lg-2">
                        <a class="nav-link dashboard-link custom-btn" href="{{ route('product.index') }}">Dashboard</a>
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

                    <form action="{{ route('Commandes.index') }}" method="GET" class="ms-lg-2">
                        <button type="submit" class="btn custom-btn">
                            <i class="bi-cart-fill fa-lg me-1"></i>
                            My Orders 
                        </button>
                    </form>

                    <div class="ms-lg-2">
                        @auth
                        <div class="dropdown">
                            <button class="btn custom-btn dropdown-toggle" type="button" id="userDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-alt fa-lg"></i> {{ auth()->user()->name }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><span class="dropdown-item"><strong>Email:</strong> {{ auth()->user()->email }}</span>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item btn btn-outline-danger"><i
                                                class="fas fa-sign-out-alt fa-lg"></i> Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        @endauth
                    </div>
                </ul>
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
    @if (session('isPayed'))
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card p-4 mt-3">
           <div class="first d-flex justify-content-between align-items-center mb-3">
             <div class="info">
                 <span class="d-block name">Thank you, Alex</span>
                 <span class="order">Order - 4554645</span>
                  
             </div>
            
              <img src="https://i.imgur.com/NiAVkEw.png" width="40"/>
               
 
           </div>
               <div class="detail">
           <span class="d-block summery">Your order has been dispatched. we are delivering you order.</span>
               </div>
           <hr>
           <div class="text">
         <span class="d-block new mb-1" >Alex Dorlew</span>
          </div>
         <span class="d-block address mb-3">672 Conaway Street Bryantiville Massachusetts 02327</span>
           <div class="  money d-flex flex-row mt-2 align-items-center">
             <img src="https://i.imgur.com/ppwgjMU.png" width="20" />
         
             <span class="ml-2">Cash on Delivery</span> 
 
                </div>
                <div class="last d-flex align-items-center mt-3">
                 <span class="address-line">CHANGE MY DELIVERY ADDRESS</span>
 
                </div>
         </div>
     </div>
@endif
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @forelse ($commands as $commend)
            
            @if ($commend->user_id === auth()->user()->id)
            <div class="card mb-4">
                <div class="row g-0">
                    <div class="col-md-6">
                        <img class="card-img img-fluid" src="{{ $commend->food ? Storage::url($commend->food->image) : ($commend->accessoir ? Storage::url($commend->accessoir->image) : Storage::url($commend->product->image)) }}" alt="Product Image">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            @if ($commend->food)
                            <h5 class="card-title"><span class="badge bg-success">Food Name: {{ $commend->food->name }}</span></h5>
                            @elseif ($commend->accessoir)
                            <h5 class="card-title"><span class="badge bg-primary">Accessory Name: {{ $commend->accessoir->name }}</span></h5>
                            @elseif ($commend->product)
                            <h5 class="card-title"><span class="badge bg-info">Pet Name: {{ $commend->product->name }}</span></h5>
                            <p class="card-text">{{ $commend->product->description }}</p>
                            @endif
                            <p class="card-text"><small class="text-muted">{{ $commend->user->name }}</small></p>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <h4>
                        @if ($commend->food)
                        {{ $commend->food->price }}
                        @elseif ($commend->accessoir)
                        {{ $commend->accessoir->price }}
                        @elseif ($commend->product)
                        {{ $commend->product->price }}
                        @endif
                        MAD
                    </h4>
                    <form action="{{ route('Commandes.destroy', $commend->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger btn-sm" type="submit">Cancel Order</button>
                    </form>
                </div>
            </div>
            @endif
            @empty
            <div class="card mt-3">
                <div class="card-body">
                    <div class="alert alert-warning" role="alert">
                        You haven't placed any orders yet. Please proceed to make a purchase.
                    </div>
                    <div>
                         
                    </div>

                </div>
            </div>
            
            
            @endforelse
           
            @if($commands->isNotEmpty())
            <div class="mt-5 d-flex justify-content-between">
                <form action="{{ route('striptPayment') }}" method="POST">
                    @csrf
                    <input type="hidden" name="command_id" value="{{ $commands->first()->id }}">
                    <button class="btn btn-success" type="submit">Checkout</button>
                </form>
      
            </div>
            
            
          
            @endif
        </div>
    </div>
</div>






    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/AddCart.js') }}"></script>
</body>
</html>
