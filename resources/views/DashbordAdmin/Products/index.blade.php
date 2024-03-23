@extends('Admin')
@section('title' , 'All Products')

@section('content')
<div class="container">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Product</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Stock</th>
                <th scope="col">Image</th>
                <th scope="col">Category</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ Str::limit($product->description, 20) }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>
                    <div style="text-align: center;">
                        <img width="30%" height="30%" src="{{ Storage::url($product->image) }}" alt="">
                    </div>
                                    </td>
                <td>No Category Exist</td> 
                <td>
                    <button class="btn btn-primary">Add to Cart</button>
                    <button class="btn btn-outline-secondary">Details</button>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="8" align="center"> fuck you</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $products->links() }}
</div>

@endsection