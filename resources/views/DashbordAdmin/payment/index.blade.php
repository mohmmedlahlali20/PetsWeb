@extends('Layouts.Admin')
@section('title' , 'All command')

@section('content')
{{-- <div class="container">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col">Date de creation</th>
                <th scope="col">User</th>
                <th scope="col">Status</th>
                <th scope="col">Payment Method</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($commands as $command)
            <tr>
                <td>{{ $command->id }}</td>
                <td>{{ optional($command->product)->name }}</td>
                <td>{{ $command->total_price }}</td>
                <td>{{ optional($command->product)->category }}</td>
                <td>{{ $command->created_at }}</td>
                <td>{{ $command->user->name }}</td>
                <td>{{ $command->status }}</td>
                <td>{{ optional($command->payment)->payment_method }}</td>
                <td>
                    <form action="" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-{{ $command->status === 'valid' ? 'danger' : 'success' }}">
                            {{ $command->status === 'valid' ? 'Invalidate' : 'Validate' }}
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" align="center">No commands exist</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $commands->links() }}
</div> --}}

@endsection
