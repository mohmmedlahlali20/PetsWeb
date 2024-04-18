@extends('Layouts.Admin')
@section('title' , 'All Products')

@section('content')
<div class="container">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Product</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Is Commanded</th> 
                    <th scope="col">rate number</th> 
                    <th scope="col">likes</th> 
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
                        @if ($is_command[$product->id])
                            <a href="{{ route('get.command') }}" class="text-white badge bg-success">Yes</a>
                        @else
                            <span class="text-white badge bg-danger">No</span>
                        @endif
                    </td>
                    
                    <td>
                        
                            @if ($product->comments->isNotEmpty())
                            <span class="badge bg-info">
                            {{ number_format($product->comments->avg('rate_number'), 1) }}
                        </span>
                        @else
                            no rate
                        @endif
                        
                     

                    </td>
                    <td>{{ $product->likes }}</td>
                    <td>
                        <div style="text-align: center;">
                            <img width="50%" src="{{ Storage::url($product->image) }}" alt="">
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
                    <td colspan="12" align="center">No products exist</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $products->links() }}
</div>


@endsection
