

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
                <form action="{{ route('forget') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="form3Example3" class="form-label">Email address</label>
                        <input type="email" name="email" id="form3Example3" class="form-control" />
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Send Reset Link</button>
                </form>

                @if(session('success'))
                <span class="text-success mb-4">{{ session('success') }}</span>
                @endif
            </div>
        </div>
    </div>
</main>


</section>
@endsection


