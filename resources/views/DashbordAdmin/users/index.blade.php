@extends('Layouts.Admin')
@section('title' , 'All Users')

@section('content')
<div class="container">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Orders Count</th>
                <th scope="col">Created At</th>
                <!-- Add more headers as needed -->
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->orders_count }}</td>

                <td>{{ $user->created_at }}</td>
                
            </tr>
            @empty
                <tr>
                    <td colspan="5" align="center">No users exist</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
