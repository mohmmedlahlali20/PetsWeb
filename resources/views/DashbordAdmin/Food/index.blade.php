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
            @forelse ($fod as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->quantity }}</td>
                <td>
                    @if (!empty($item->image))
                        <img src="{{ Storage::url($item->image) }}" alt="Food Image" style="max-width: 100px;">
                    @else
                        No Image
                    @endif
                </td>
                <td>{{ $item->created_at }}</td>
                <td> 
                    <form action="{{ route('food.destroy' , $item->id ) }}" method="post" >
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">rrrrrrrr</button>
                    </form>
                    <button class="btn btn-primary">Edit</button>

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

    
