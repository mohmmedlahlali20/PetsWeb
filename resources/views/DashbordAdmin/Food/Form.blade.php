@extends('Layouts.Admin')
@section('title' , 'content Food')
           
@section('content')
<h1 class="text-center mb-5 mt-5 font-bold">@yield('title')</h1>
<form action="{{ route('Food.store') }}" method="POST" class="form-group" enctype="multipart/form-data">
    @csrf
  
    <div class="row mb-3">
        <div class="col">
            <input type="text" class="form-control border" value="" placeholder="Product name" name="name">
        </div>
        <div class="col">
            <input type="text" class="form-control border" value="" placeholder="Price" name="price">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <input type="file" class="form-control border" name="image">
            {{-- Display image if it exists --}}
            {{-- @if ($product && $product->image)
                <img width="50%" class="mt-5" src="{{ Storage::url($product->image) }}" alt="">
            @endif --}}
        </div>
        <div class="col">
            <input type="number" class="form-control border" value="" placeholder="Quantity" name="quantity">
        </div>
    </div>
    <div class="row mb-3">
      
        <div class="col">
         
        </div>
        
        
    </div>
    <div class="row">
       <button class="btn btn-primary">add</button>
    </div>
</form>
@endsection
