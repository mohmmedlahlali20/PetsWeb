

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
    @if (session()->has('success'))
        <div class="alert alert-success">fuck you</div>
    @endif
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4">
            <div class="card-body">
                <p class="card-text">We will send a link to your email. Use that link to reset your password.</p>
                <form action="{{ route('forget') }}" method="POST">
                    @csrf
                    <input type="text" hidden value="{{ $token }} " name="token">
                    <div class="mb-4">
                        <label for="form3Example3" class="form-label">Email</label>
                        <input type="email" name="email" id="form3Example3" class="form-control" />
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="form3Example3" class="form-label">Password</label>
                        <input type="password" name="password" id="form3Example3" class="form-control" />
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="form3Example3" class="form-label">Password Confirmed</label>
                        <input type="password" name="password_confirmed" id="form3Example3" class="form-control" />
                        @error('password_confirmed')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">New Password</b utton>
                </form>
            </div>
        </div>
    </div>
</main>

</section>
@endsection


