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
                        <a class="nav-link" href="{{ route('Home.index') }}"><i class="fas fa-home"></i> Home</a>
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
                            href="{{ Storage::url($products->image) }}"
                            class="item-thumb">
                            <img width="350" height="350" class="rounded-2"
                                src="{{ Storage::url($products->image) }}" alt="Product Image" />
                        </a>
                    </div>
                </aside>
                <main class="col-lg-6">
                    <div class="ps-lg-3">
                        <h4 class="title text-dark">{{ $products->name }}</h4>
                        <div class="d-flex flex-row my-3">
                            <div class="text-warning mb-1 me-2">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="ms-1">{{ $averageRating }}</span>
                            </div>
                            <span class="text-muted">
                                <i class="fas fa-shopping-basket fa-sm mx-1"></i>
                                @auth 
                                    <span>: {{ auth()->user()->name }}</span> 
                                @endauth 
                            </span>
                        </div>
                        <div class="mb-3">
                            <span class="h5">{{ $products->price }}.00</span>
                            <span class="text-muted">MAD</span>
                        </div>
                   <div class="mb-4 max-width-100">
    <p class="text-muted border-bottom border-secondary pb-2">Description:</p>
    <div class="description-container" style="max-height: 3em; overflow: hidden;">
        <p class="text-justify">{{ $products->description }}</p>
    </div>
</div>

                        <div class="row">
                            <div class="col-md-6">
                                <dl class="row">
                                    <dt class="col-sm-4">Sex:</dt>
                                    <dd class="col-sm-8">{{ $products->sex }}</dd>
                            
                                    <dt class="col-sm-4">Age:</dt>
                                    <dd class="col-sm-8">{{ $products->age }} months</dd>
                                </dl>
                            </div>
                            
                            <div class="col-md-6">
                                <dl class="row">
                                    <dt class="col-sm-4">Category:</dt>
                                    <dd class="col-sm-8">{{ $products->category->name }}</dd>
    
                                    <dt class="col-sm-4">Date Created:</dt>
                                    <dd class="col-sm-8">{{ $products->created_at }}</dd>
                                </dl>
                            </div>
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
                <div class="col-md-8 col-lg-7 col-xl-6 pb-4">
                    <div class="comment-section bg-light rounded p-3 shadow">
                        @if ($comments->isNotEmpty())
                            @forelse ($comments as $item)
                                <div class="comment mt-4 border bg-white rounded p-3 shadow-sm">
                                    <div class="d-flex justify-content-between align-items-center">
                                      
                                        <div class="d-flex align-items-center">
                                            @if($item->user->image)
                                            <img src="{{ Storage::url($item->user->image) }}" alt="Avatar" class="avatar img-fluid rounded-circle me-2" style="width: 50px; height: 50px;">
                                        @else
                                            <img src="{{ asset('assets/images/avatar.png')  }}" alt="Default Avatar" class="avatar img-fluid rounded-circle me-2" style="width: 50px; height: 50px;">
                                        @endif
                                            <h5 class="m-0">{{ $item->user->name }}</h5>
                                        </div>
                                    </div>
                                    <span class="text-muted">{{ $item->created_at }}</span>
                                    <p class="mt-2">{{ $item->comments }}</p>
                                    <span>{{ $item->rate_number }}/10</span>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <form action="" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-link btn-sm">
                                                <i class="far fa-thumbs-up text-primary me-2"></i>
                                            </button>
                                        </form>
                                        <span class="small">Likes: 0</span>
                                    </div>
                                </div>
                            @empty
                                <div class="comment mt-4 p-3 bg-white rounded shadow-sm">
                                    <span>No comments exist</span>
                                </div>
                            @endforelse
                        @endif
                    </div>
                </div>
                <div class="col-md-4 col-lg-5 col-xl-6 pb-4">
                    <form action="{{ isset($comment) ? route('commentes.update', $comment->id) : route('commentes.store') }}" method="POST" class="border p-4 rounded shadow" style="background-color: #f0f2f5;">
                        @csrf
                        @isset($comment)
                            @method('PUT')
                        @endisset
                        <input type="hidden" name="products_id" value="{{ $products->id }}">
                        @if (session('success'))
                            <span class="text-success">{{ session('success') }}</span>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <h4 class="mb-4">{{ isset($comment) ? 'Update' : 'Leave a' }} comment</h4>
                        <div class="form-group">
                            <label for="comments">Message</label>
                            <textarea name="msg" id="comments" cols="30" rows="5" class="form-control" style="background-color: rgb(221, 217, 217);">{{ isset($comment) ? $comment->comments : '' }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <input type="number" name="rating" id="rating" class="form-control" value="{{ isset($comment) ? $comment->rate_number : '' }}">
                        </div>
                        <div class="form-group mt-4">
                            <button type="submit" id="post" class="btn btn-primary">{{ isset($comment) ? 'Update Comment' : 'Post Comment' }}</button>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

</body>

</html>
