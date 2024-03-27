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
                <th scope="col">Stock</th>
                <th scope="col">Image</th>
                <th scope="col">Category</th>
                <th scope="col">Date de creation</th>
                <th scope="col">Date de delitation</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            {{-- @dd( $products) --}}
           
            @forelse ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ Str::limit($product->description, 20) }}</td>
                <td>{{ $product->price }}$</td>
                <td>{{ $product->quantity }}</td>
                <td>
                    <div style="text-align: center;">
                        <img width="20%"  src="{{ Storage::url($product->image) }}" alt="">
                    </div>
                                    </td>
                                    <td class=" m-5 badge bg-primary">
                                        @if ($product->category)
                                            {{ $product->category->name }}
                                        @else
                                            No Category Assigned
                                        @endif
                                    </td>
                <td>{{ $product->created_at }}</td>
                <td>{{ $product->deleted_at }}</td>
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
                    <td colspan="10" align="center"> no products exist</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $products->links() }}
</div>

@endsection