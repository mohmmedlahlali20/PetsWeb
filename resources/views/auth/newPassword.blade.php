

@extends('Layouts.Auth')
@section('title' , 'forgetPAssword')
@section('content')
<section class="background-radial-gradient overflow-hidden">
    <style>
        main {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.container {
    max-width: 400px; 
}

    </style>
<main>
   

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4">
            <div class="card-body">
                <p class="card-text">We will send a link to your email. Use that link to reset your password.</p>
                <form action="{{ route('reset.password.post') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $token }}" name="token"> <!-- Utilisation d'un champ caché pour envoyer le jeton -->
                    <div class="mb-4">
                        <label for="form3Example3" class="form-label">Email</label>
                        <input type="email" name="email" id="form3Example3" class="form-control" />
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" />
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">Password Confirmed</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" />
                        @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">New Password</button> <!-- Correction de la balise de fermeture -->
                </form>
                
            </div>
        </div>
    </div>
</main>

</section>
@endsection


