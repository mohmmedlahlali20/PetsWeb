<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome for icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">

</head>
<body style="overflow: hidden;">
<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">
  <style>
   .background-radial-gradient {
      background: url('');
      width: 100vw;
      height: 100vh;
    }

    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#36f125, #00f521);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#d5d6d5, #ffffff);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
  </style>

  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(220, 91%, 69%)">
            Find Everything <br />
            <span style="color: hsl(218, 92%, 61%)">Your Pet Needs</span>
        </h1>
        <p class="mb-4 text-xl " style="color: hsl(0, 0%, 1%)">
            At our pet store, we offer a wide range of products to cater to all your pet's needs.
            Whether you have a dog, cat, bird, or fish, we have everything you need to keep them happy and healthy.
            From premium pet food to stylish accessories, we have it all.
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong">
          <img style="margin-left: -40px" src="{{ asset('assets/images/cat1.jpg') }}" alt="">
        </div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong">
          <img style="margin-left: 70px; padding-top:-80px" src="{{ asset('assets/images/arnab1.jpg') }}" alt="">
        </div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
            <form action="{{ route('login.post') }}" method="POST">
              @csrf

              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Email address</label>
                <input type="email" name="email" id="form3Example3" class="form-control" />
              </div>
              @error('name')
              <span class="text-danger">{{ $message }}</span>
           @enderror
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example4">Password</label>
                <input type="password" name="password" id="form3Example4" class="form-control" />
              </div>
              @error('password')
              <span class="text-danger">{{ $message }}</span>
           @enderror
              <div class="form-check d-flex mt-6">
                <label class="form-check-label" for="form2Example33">
                    remember me
                  </label>
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
              </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block mb-4 mt-2">
                Sign up
              </button>

              <!-- Register buttons -->
              <div class="text-center">
                <p>or sign up with:</p>
                

                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-google"></i>
                </button>


                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-github"></i>
                </button>
              </div>
              <div class="text-center mt-3">
                <a href="#" class="link-info me-4">Forgot Password?</a>
                <span class="text-muted">|</span>
                <a href="" class="link-info ms-4">Create New Account</a>
              </div>
            </form>
          </div>
        
        </div>
      </div>
    </div>
  </div>
</section>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
