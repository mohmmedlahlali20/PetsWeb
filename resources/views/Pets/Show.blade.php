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
    <nav class="navbar  navbar-expand-lg navbar-light rbg-nav">
        <div class="container">
            <a class="navbar-brand" href="{{ route('Home.index') }}">
                <img src="{{asset('assets/images/logo.jpg')}}" alt="Logo" class="logo">
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
                                src="{{ Storage::url($products->image) }}" />
                        </a>
                    </div>

                </aside>
                <main class="col-lg-6">
                    <div class="ps-lg-3">
                        <h4 class="title text-dark">
                            {{ $products->name }}<br />

                        </h4>
                        <div class="d-flex flex-row my-3">
                            <div class="text-warning mb-1 me-2">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="ms-1">
                                    {{ $averageRating }}
                                </span>
                            </div>
                            <span class="text-muted"><i
                                    class="fas fa-shopping-basket fa-sm mx-1"></i>
                                    {{-- @auth --}}
                                        {{-- <span>: {{ auth()->user()->name }}</span> --}}
                                    {{-- @endauth --}}

                        </div>

                        <div class="mb-3">
                            <span class="h5">${{ $products->price }}.00</span>
                            <span class="text-muted">/per box</span>
                        </div>

                        <p>
                            {{ $products->description }}
                        </p>

                        <div class="row">
                            <dt class="col-3">Sex:</dt>
                            <dd class="col-9">{{ $products->sex }}</dd>

                            <dt class="col-3">Age</dt>
                            <dd class="col-9">{{ $products->age }}</dd>

                            <dt class="col-3">Category</dt>
                            <dd class="col-9">{{ $products->category->name }}</dd>

                            <dt class="col-3">date du creation </dt>
                            <dd class="col-9">{{ $products->created_at }}</dd>
                        </div>

                        <hr />


                    </div>
            </div>

        </div>
        </main>
        </div>
        </div>
    </section> 
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-7 col-xl-6 pb-4">
                    <div class="comment-section border bg-light rounded p-3 shadow">
                        @if ($comments->isNotEmpty())
                            @forelse ($comments as $item)
                                <div class="comment mt-4 text-justify border bg-light rounded p-3 float-left shadow">
                                    <div class="d-inline">
                                        <form action="{{ route('commentes.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editComment{{ $item->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </div>
                                    <h5>
                                        <img src="{{ Storage::url($item->user->avatar) }}" alt="" class="avatar img-fluid rounded-circle" style="width: 50px; height: 50px;">

                                        {{ $item->user->name }}

                                    </h5>
                                    <span>{{ $item->created_at }}</span>
                                    <br>
                                    <p>{{ $item->comments }}</p>
                                    <span>{{ $item->rate_number }}/10</span>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex flex-row align-items-center">
                                            <span class="small"></span>
                                           
                                            <form action="" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-link btn-sm">
                                                    <i class="far fa-thumbs-up text-primary me-2"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <span>No comments exist</span>
                            @endforelse
                        @else
                            <span>No comments exist</span>
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
                            <span class="text-success">
                                {{ session('success') }}
                            </span>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <h4>{{ isset($comment) ? 'Update' : 'Leave a' }} comment</h4>
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
