@extends('Layouts.Admin')
@section('title', 'All Users')

@section('content')
<div class="container">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Avatar</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Provider</th>
                <th scope="col">Orders Count</th>
                <th scope="col">Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr>
                
                <td>{{ $user->id }}</td>
                <td>
                    @if ($user->image)
                        <img src="{{ Storage::url($user->image) }}" alt="Avatar" width="50" height="50">
                    @else
                        <img src="{{ asset('assets/images/avatar.png') }}" width="80" height="50" alt="">
                    @endif
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->provider }}</td>
                <td>{{ $user->commands()->count() }}</td> 
                <td>{{ $user->created_at }}</td>
                
            </tr>
            @empty
            <tr>
                <td colspan="9" align="center">No users exist</td>
            </tr>
            @endforelse
        </tbody>
        
    </table>
</div>
@endsection
