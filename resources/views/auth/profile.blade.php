@extends('Layouts.Auth')
@section('title', 'Profile')
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 bg-light">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="{{ route('profile') }}" class="list-group-item list-group-item-action active">Profile</a>
            </div>
            <div class="list-group mt-3">
                <div class="list-group-item">
                    <img src="{{ Auth::user()->image ? Storage::url(Auth::user()->image) : 'default-avatar.jpg' }}" alt="Avatar" class="img-fluid rounded-circle">
                </div>
                <div class="list-group-item list-group-item-secondary">User Information</div>
                <div class="list-group-item">
                    <strong>Name:</strong> {{ Auth::user()->name }}
                </div>
                <div class="list-group-item">
                    <strong>Email:</strong> {{ Auth::user()->email }}
                </div>
               
            </div>
        </div>
 
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">User Commands</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Command</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userCommands as $command)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $command->user->name }}</td>
                                <td>{{ $command->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End Main Content -->
    </div>
</div>
@endsection
