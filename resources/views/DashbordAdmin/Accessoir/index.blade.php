@extends('Layouts.Admin')
@section('title' , 'content Food')

@section('content')
<div class="container">
    <table class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Food Name</th>
                <th scope="col">Price</th>
                <th scope="col">Stock</th>
                <th scope="col">Image</th>
                <th scope="col">Date de creation</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($Accessoir as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->quantity }}</td>
                <td>
                    @if (!empty($item->image))
                    <div style="text-align: center;">
                        <img width="20%"  src="{{ Storage::url($item->image) }}" alt="">
                    </div>
                    @else
                        No Image
                    @endif
                </td>
                <td>{{ $item->created_at }}</td>
                <td> 
                    <button class="btn btn-primary">Edit</button>
                    <form action="{{ route('accessoir.destroy' , $item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">No records found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

    
