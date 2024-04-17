@extends('Layouts.Admin')
@section('title' , 'All command')

@section('content')

<div class="container">
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Date de creation</th>
                <th scope="col">User</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($commands as $command)
            <tr>
                <td>{{ $command->id }}</td>
                <td>{{ optional($command->product)->name }}</td>
                <td>{{ $command->total_price }} MAD</td>
               
                <td>{{ $command->created_at }}</td>
                <td>{{ $command->user->name }}</td>
                <td>
                    @if ($command->payment)
                        <span class="text-success">Paid by {{ $command->user->name }}</span>
                    @else
                        <span class="text-danger">Not Paid</span>
                    @endif
                </td>
                <td>
                    @if ($command->payment)
                        <span> <i class="text-success 	fab fa-angellist">is payed</i></span>
                    @else
                    <form action="{{ route('admin.destroy' ,  $command->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">cancel</button>
                    </form>
                    @endif
            
                </td>

            </tr>
            @empty
            <tr>
                <td colspan="8" align="center">No commands exist</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $commands->links() }}
</div>

@endsection
