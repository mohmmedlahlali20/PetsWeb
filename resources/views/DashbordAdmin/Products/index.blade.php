@extends('Layouts.Admin')
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
                <th scope="col">is commended</th> <!-- Updated column heading -->
                <th scope="col">Image</th>
                <th scope="col">Category</th>
                <th scope="col">Sex</th>
                <th scope="col">Age</th>
                <th scope="col">Date de creation</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ Str::limit($product->description, 20) }}</td>
                <td>{{ $product->price }}$</td>
                <td>
                    fucking
                
                </td>
                <td>
                    <div style="text-align: center;">
                        <img width="20%"  src="{{ Storage::url($product->image) }}" alt="">
                    </div>
                </td>
                <td class="m-5">
                    @if ($product->category)
                        <span class="badge bg-primary">
                            <a href="{{ route('category.show', $product->category->id) }}" class="text-decoration-none text-white">{{ $product->category->name }}</a>
                        </span>
                    @else
                        <span class="badge bg-secondary">No Category Assigned</span>
                    @endif
                </td>
                <td>{{ $product->sex }}</td>           
                <td>{{ $product->age }}</td>
                <td>{{ $product->created_at }}</td>
                
                <td>
                    <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </form><br>
                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                   
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="11" align="center">No products exist</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $products->links() }}
</div>

@endsection
