@extends('Layouts.Admin')
@section('title' , 'All command')

@section('content')
<div class="container">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Pets name</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col">Date de creation</th>
                <th scope="col">User </th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            {{-- @dd( $products) --}}
           
            @forelse ($commands as $command)
            <tr>
                <td>{{ $command->id }}</td>
                <td>{{ $command->product->name }}</td>
                <td>{{ $command->product->price }}$</td>

                                    <td class="m-5">
                                      {{ $command->product->category->name}}
                                    </td>
                                    
                <td>{{ $command->created_at }}</td>
                <td>{{ $command->user->name }}</td>
                <td>
                    <form action="{{ route('command.update', $command->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        
                        @if ($command->commend === 'valid')
                            <input type="hidden" name="status" value="invalid">
                            <button type="submit" class="btn btn-danger">{{ $command->commend }}</button>
                        @else
                            <input type="hidden" name="status" value="valide">
                            <button type="submit" class="btn btn-success">{{ $command->commend }}</button>
                        @endif
                    </form>
                    
                    
                    <br>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="10" align="center"> no commands exist</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $commands->links() }}
</div>
 @endsection

 {{--route('command.update', $command->id) --}}