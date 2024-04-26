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

        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('css/card.css')}}" rel="stylesheet" />
    <title>{{ config('app.name') }} </title>
</head>

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
                        <a class="nav-link" href="#"><i class="fas fa-home"></i> Home</a>
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
    


    <section class="py-5">
        <div class="container">
            <div class="row gx-5">
                <aside class="col-lg-6">
                    <div class="border rounded-4 mb-3 d-flex justify-content-center">

                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image"
                            href=""
                            class="item-thumb">
                            <img width="350" height="350" class="rounded-2"
                                src="{{ Storage::url($accessoir->image) }}" />
                        </a>
                    </div>

                </aside>
                <main class="col-lg-6">
                    <div class="ps-lg-3">
                        <h4 class="title text-dark">
                            {{ $accessoir->name }} 
                        </h4>
                        <div class="mb-3">
                            <span class="h5">${{ $accessoir->price }}.00</span> 
                            <span class="text-muted">/per box</span>
                        </div>
                        <img src="{{ Storage::url($accessoir->image) }}" class="img-fluid rounded mb-3" alt="{{ $accessoir->name }}"> 
                        <p>
                        </p>
                        
                        <div class="row">
                            <dt class="col-3">quantity:</dt>
                            <dd class="col-9">{{ $accessoir->quantity }}</dd> 
                
                       
                
                            <dt class="col-3">Date of creation</dt>
                            <dd class="col-9">{{ $accessoir->created_at }}</dd>
                        </div>
                        <hr />
                    </div>
                </main>
                
        </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-md-6 col-12 pb-4">
                    <div class="comment-section border bg-light rounded p-3 shadow">
                        <div class="comment mt-4 text-justify border bg-light rounded p-3 shadow">
                            <h4>User Name</h4>
                            <span>Date</span>
                            <br>
                            <p>Comment Text</p>
                            <span>Rating</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
                    @if (session('success'))
                    <span class="text-success">
                     {{ session('success') }}
                    </span>
                        
                     @endif
 
                     @if (session('error'))
                     <span class="text-danger">
                         {{ session('error') }}
                     </span>
                       
                    
                     @endif
                     @php
                       dump($accessoir->id);
                     @endphp
                  <form action="{{ route('accessoir.comments', $accessoir->id) }}" method="POST" class="border p-4 rounded shadow" style="background-color: #f0f2f5;">

                        @csrf
                       
                        <h4>Leave a comment</h4>
                        <div class="form-group">
                            <label for="comments">Message</label>
                            <input type="hidden" name="accessoir_id" value="{{ $accessoir->id }}">
                            <textarea name="msg" id="comments" cols="30" rows="5" class="form-control"
                                style="background-color: rgb(221, 217, 217);"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <input type="number" name="rating" id="rating" class="form-control">
                        </div>
                        <div class="form-group mt-4">
                            <button type="submit" id="post" class="btn btn-primary">Post Comment</button>
                        </div>
                    </form>
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
    <script src="//unpkg.com/alpinejs" defer></script>

</body>

</html>
