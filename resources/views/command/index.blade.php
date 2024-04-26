
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
                                My Orders 
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
            <div class="container mt-5">
                <div class="row">
                    @forelse ($commands as $command)
                        @if (auth()->check() && $command->user_id === auth()->user()->id)
                            <div class="col-md-6"> 
                                <div class="card mb-3">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img src="{{ $command->food ? Storage::url($command->food->image) : ($command->accessoir ? Storage::url($command->accessoir->image) : Storage::url($command->product->image)) }}" class="card-img" alt="Product Image">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                @if ($command->food)
                                                    <h5 class="card-title"><span class="badge bg-success">Food Name: {{ $command->food->name }}</span></h5>
                                                @elseif ($command->accessoir)
                                                    <h5 class="card-title"><span class="badge bg-primary">Accessory Name: {{ $command->accessoir->name }}</span></h5>
                                                @elseif ($command->product)
                                                    <h5 class="card-title"><span class="badge bg-info">Pet Name: {{ $command->product->name }}</span></h5>
                                                    <p class="card-text">{{ Str::limit($command->product->description, 10) }}</p>
                                                @endif
                                                <p class="card-text">$ {{ $command->food ? $command->food->price : ($command->accessoir ? $command->accessoir->price : $command->product->price) }} MAD</p>
                                                <form action="{{ route('Commandes.destroy', $command->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger"><i class="fas fa-trash"></i> Remove</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                      
                        @endif
                    @empty
                      
                    @endforelse
@if ($commands->count() > 0)
<div class="col-md-12 mt-5 d-flex justify-content-end"> 
    <form action="{{ route('striptPayment') }}" method="POST">
        @csrf
        <input type="hidden" name="commend_id" value="{{ optional($commands->first())->id }}">
        <button class="btn btn-success" type="submit">Checkout</button>
    </form>
</div> 
    
@endif
                </div>
            </div>
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
