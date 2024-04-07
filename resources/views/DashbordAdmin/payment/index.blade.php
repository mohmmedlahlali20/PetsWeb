@extends('Layouts.Admin')
@section('title' , 'All pyment')

@section('content')
<div class="container">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Total Price</th>
                <th scope="col">Username</th>
                <th scope="col">products</th>
                <th scope="col">Date de creation</th>
                <th scope="col">User</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($payment as $paid)
            <tr>
                <td>{{ $paid->id }}</td>
                <td>{{ $paid->amount }}$</td>
                <td>{{ optional($paid->command)->user ? $paid->command->user->name : 'fuck' }}</td>
                <td>{{ optional($paid->command)->product ? $paid->command->product->name : 'fuck' }}</td>
                
                
                
                                    
                <td>{{ $paid->created_at }}</td>
                <td>{{ $paid->payment_status }}</td>
            </tr>
            @empty
                <tr>
                    <td colspan="6" align="center"> no commands exist</td>
                </tr>
            @endforelse
        </tbody>
    </table>
   
</div>
@endsection