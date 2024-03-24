@extends('Layouts.Admin')
@section('title' , ($IsUpdte? 'Update' : 'Create')  .  ' Products')

@section('content')
<h1 class="text-center mb-5 mt-5 font-bold">@yield('title')</h1>
<form action="{{ route('product.store') }}" method="POST" class="form-group" enctype="multipart/form-data" >
    @csrf
    <div class="row mb-3">
        <div class="col">
            <input type="text" class="form-control border" value="{{ old('name') ?? $product->name }}" placeholder="Product name" name="name">
        </div>
        <div class="col">
            <input type="text" class="form-control border" value="{{ old('price') ?? $product->price }}" placeholder="Price" name="price">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <textarea class="form-control border" placeholder="Description" name="description">{{ old('description') ?? $product->description }}</textarea>
        </div>
        <div class="col">
            <input type="number" class="form-control border" value="{{ old('quantity') ?? $product->quantity }}" placeholder="Quantity" name="quantity">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <input type="file" class="form-control border" name="image">
        </div>
        <div class="col">
            <select class="form-control border"  name="category_id">
                <option value="">Select Category</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @if($IsUpdte)
                <button type="submit" class="btn btn-primary">Update Products</button>
            @else
                <button type="submit" class="btn btn-primary">Add New Products</button>
            @endif
           
        </div>
    </div>
</form>



@endsection