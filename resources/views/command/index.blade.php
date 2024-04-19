
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
    <nav class="navbar navbar-expand-lg rbg-nav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!"><img style="border-radius: 10px;" width="30%" src="{{ asset('assets/images/logo.jpg') }}" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
    
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href=""><i class="fas fa-home"></i></a></li>
                    @if(Auth::check() && Auth::user()->role == 'admin')
                    <li class="nav-item"><a class="nav-link" href="{{ route('product.index') }}">Dashboard</a></li>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
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
                        <a class="nav-link active custom-btn login-btn" aria-current="page" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active custom-btn register-btn" aria-current="page" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Register</a>
                    </li>
                    @endguest
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-alt"></i> 
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <span class="dropdown-item">
                                    <strong>Name:</strong> {{ auth()->user()->name }}
                                </span>
                            </li>
                            <li>
                                <span class="dropdown-item">
                                    <strong>Email:</strong> {{ auth()->user()->email }}
                                </span>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item btn btn-outline-danger"><i class="fas fa-sign-out-alt"></i> Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    
                    @endauth
                </ul>
                {{-- <form action="" class="d-flex">
                    <a id="" class="btn btn-outline-dark" href="{{ route('Commandes.index') }}">
                        <i class="bi-cart-fill me-1"></i>
                        My Cards ({{ $userCommandCount }})
                    </a>
                </form> --}}
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
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                @forelse ($commands as $commend)
                @if ($commend->user_id === auth()->user()->id)
                <br>
                <div class="row p-2 bg-white border rounded">
                    <div class="col-md-3 mt-1">
                        @if ($commend->food)
                        <img class="img-fluid img-responsive rounded product-image" src="{{ Storage::url($commend->food->image) }}">
                        @elseif ($commend->accessoir)
                        <img class="img-fluid img-responsive rounded product-image" src="{{ Storage::url($commend->accessoir->image) }}">
                        @elseif ($commend->product)
                        <img class="img-fluid img-responsive rounded product-image" src="{{ Storage::url($commend->product->image) }}">
                        @endif
                    </div>
                    <div class="col-md-6 mt-1">
                        @if ($commend->food)
                        <h5 class="badge bg-success">Food Name: {{ $commend->food->name }}</h5>
                        @elseif ($commend->accessoir)
                        <h5 class="badge bg-primary">Accessory Name: {{ $commend->accessoir->name }}</h5>
                        @elseif ($commend->product)
                        <h5 class="badge bg-info">Pet Name: {{ $commend->product->name }}</h5>
                        <h5 class="">{{ $commend->product->description }}</h5>
                        @endif

                    </div>

                    <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                        <div class="d-flex flex-row align-items-center">
                            <h4 class="mr-1">
                                @if ($commend->food)
                                {{ $commend->food->price }}
                                @elseif ($commend->accessoir)
                                {{ $commend->accessoir->price }}
                                @elseif ($commend->product)
                                {{ $commend->product->price }}
                                @endif
                                MAD
                            </h4>
                        </div>
                        <h6 class="text-success">{{ $commend->user->name }}</h6>
                        <div class="d-flex flex-column mt-4">
                            <button class="btn btn-outline-success btn-sm mt-2" type="button">Total Commands:</button>
                        </div>
                        <form action="{{ route('Commandes.destroy', $commend->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="d-flex flex-column mt-4">
                                <button class="btn btn-outline-danger btn-sm mt-2" type="submit">Cancel Order</button>
                            </div>
                        </form>
                    </div>
                </div>
              

                @endif
                @empty
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
                @endforelse
                {{ $commands->links() }}
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


    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/AddCart.js') }}"></script>
</body>
</html>
