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
    <title>{{ config('app.name')  }} </title>
</head>
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
                <form action=""  class="d-flex">
                  <a id="" class="btn btn-outline-dark"  href="{{ route('Commande.index') }}">
                      <i class="bi-cart-fill me-1"></i>
                     My Cards
                  </a>
              </form>
            </div>
        </div>
    </nav>
  
      
      <!-- content -->
      <section class="py-5">
        <div class="container">
          <div class="row gx-5">
            <aside class="col-lg-6">
              <div class="border rounded-4 mb-3 d-flex justify-content-center">
               
              </div>
              <div class="d-flex justify-content-center mb-3">
                <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big1.webp" class="item-thumb">
                  <img width="60" height="60" class="rounded-2" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big1.webp" />
                </a>
              </div>
              <!-- thumbs-wrap.// -->
              <!-- gallery-wrap .end// -->
            </aside>
            <main class="col-lg-6">
              <div class="ps-lg-3">
                <h4 class="title text-dark">
                  Quality Men's Hoodie for Winter, Men's Fashion <br />
                  Casual Hoodie
                </h4>
                <div class="d-flex flex-row my-3">
                  <div class="text-warning mb-1 me-2">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <span class="ms-1">
                      4.5
                    </span>
                  </div>
                  <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>154 orders</span>
                  <span class="text-success ms-2">In stock</span>
                </div>
      
                <div class="mb-3">
                  <span class="h5">$75.00</span>
                  <span class="text-muted">/per box</span>
                </div>
      
                <p>
                  Modern look and quality demo item is a streetwear-inspired collection that continues to break away from the conventions of mainstream fashion. Made in Italy, these black and brown clothing low-top shirts for
                  men.
                </p>
      
                <div class="row">
                  <dt class="col-3">Sex:</dt>
                  <dd class="col-9">Regular</dd>
      
                  <dt class="col-3">Age</dt>
                  <dd class="col-9">Brown</dd>
      
                  <dt class="col-3">Category</dt>
                  <dd class="col-9">Cotton, Jeans</dd>
      
                  <dt class="col-3">Brand</dt>
                  <dd class="col-9">Reebook</dd>
                </div>
      
                <hr />
      
               
                  </div>
                </div>

              </div>
            </main>
          </div>
        </div>
      </section>
   
 <!-- Section des commentaires -->
<section class="bg-light border-top py-4">
    <div class="container">
        <div class="row gx-4">
            <div class="col-lg-8 mb-4">
                <div class="border rounded-2 px-3 py-2 bg-white">
                    <!-- Onglets de navigation -->
                    <ul class="nav nav-pills mb-3" id="ex1-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="ex1-tab-1" data-bs-toggle="pill" data-bs-target="#ex1-pills-1" type="button" role="tab" aria-controls="ex1-pills-1" aria-selected="true">Comments</button>
                        </li>
                    </ul>
                    <!-- Contenu des onglets -->
                    <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                        <div class="border rounded-2 p-3">
                            <p>
                            </p>
                            <!-- Contenu des commentaires -->
                            <div class="comments">
                                <!-- Liste des commentaires existants -->
                                <div class="comment border rounded p-2 mb-2">
                                    <p>User1: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                                <!-- Ajoutez plus de commentaires si nécessaire -->
                                <div class="comment border rounded p-2 mb-2">
                                    <p>User2: Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                                <div class="comment border rounded p-2 mb-2">
                                    <p>User3: Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>

                                <div class="comment border rounded p-2 mb-2">
                                    <p>User1: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                                <!-- Ajoutez plus de commentaires si nécessaire -->
                                <div class="comment border rounded p-2 mb-2">
                                    <p>User2: Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                                <div class="comment border rounded p-2 mb-2">
                                    <p>User3: Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                        
                            <!-- Formulaire pour ajouter un commentaire -->
                            <form action="" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="comment" class="form-label">Comment</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="rating" class="form-label">Rating (out of 10)</label>
                                    <input type="number" class="form-control" id="rating" name="rating" min="1" max="10" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Comment</button>
                            </form>
                        </div>
                    </div>
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
<script src="//unpkg.com/alpinejs" defer></script>

</body>
</html>