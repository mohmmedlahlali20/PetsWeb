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
    #big_div {
    background-image: url('{{ asset('assets/images/laura.jpg') }}');
    z-index:999
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

                      <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                      
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
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
                            <li><hr class="dropdown-divider" /></li>
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
                <form class="d-flex">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </button>
                </form>
              
            </div>
        </div>
    </nav>

    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <img src="{{asset('assets/images/pets1.png')}}" alt="Shop Logo" class="img-fluid mb-4">
                <h1 class="display-4 fw-bolder">Shop in style</h1>
                <p class="lead fw-normal text-white-50 mb-0">With this shop homepage template</p>
            </div>
        </div>
    </header>
    <br><br><br><br><br>
    <div  id="big_div"  class="container">
        <div  class="search">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="d-flex justify-content-center">
                        &nbsp;&nbsp;&nbsp;
                        <div class="search-2"> 
                            <i class='bx bxs-map'></i> 
                            <input type="search" class="form-control" placeholder="Search 2"> 
                            <button class="btn btn-primary">Search</button> 
                        </div>
                    </div>
                    <br>
                  
                </div>
            </div>
        </div>
    </div>

    <section class="cat_product_area section_gap">
      <div class="container">
        <div class="row flex-row-reverse">
          <div class="col-lg-9">
            
            
            <div class="latest_product_inner">
              <div class="row">
                {{ $products->links() }}
                @forelse ($products as $product)
                <div class="col-lg-4 col-md-6">
                    <div class="single-product">
                      <div class="product-img">
                        <img
                          class="card-img "
                          src="{{ Storage::url($product->image) }}"
                          alt=""
                        />
                        <div class="p_icon">
                          <a href="#">
                            <i class="fas fa-eye"></i>
                          </a>
                          <a href="#">
                            <i class="	fas fa-search"></i>
                          </a>
                          <a href="#">
                            <i class="	fas fa-shopping-basket"></i>
                          </a>
                        </div>
                      </div>
                      <div class="product-btm">
                        <a href="#" class="d-block">
                          <h4>{{ $product->name }}</h4>
                          <h6 class="mr-4 badge bg-primary"> category : @if ($product->category)
                            {{ $product->category->name }}
                        @else
                            No Category Assigned
                        @endif
                      </h6>
                        </a>
                        <div class="mt-3">
                          <span class="mr-4 badge bg-primary">${{$product->price }}</span>
                          <span class="badge {{ $product->quantity <= 5 ? 'bg-danger' : 'bg-success' }}">Stock: {{ $product->quantity }}</span>
                          <hr>
                          <span class="mr-4">created at :{{ $product->created_at }}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                @empty
                    <div class="container">
                        <div class="alert alert-warning">
                            no Products exist
                        </div>
                    </div>
                @endforelse
              
              </div>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="left_sidebar_area">
              <aside class="left_widgets p_filter_widgets">
                <div class="l_w_title">
                  <h3>Browse Categories</h3>
                </div>
                <div class="widgets_inner">
                  <ul class="list">
                    @forelse ($categories as $cat)
                    <li>
                      <a href="#">{{ $cat->name }}</a>
                    </li>
                    @empty
                    <li>
                      <a href="#">No category Exist</a>
                    </li>
                    @endforelse
                   
                  </ul>
                </div>
              </aside>

      
              <aside class="left_widgets p_filter_widgets">
                <div class="l_w_title">
                  <h3>Price Filter</h3>
                </div>
                <div class="widgets_inner">
                  <div class="range_item">
                    <div id="slider-range"></div>
                    <div class="">
                      <label for="amount">Price : </label>
                      <input type="text" id="amount" readonly />
                    </div>
                  </div>
                </div>
              </aside>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{asset('js/scripts.js')}}"></script>
</body>
</html>
