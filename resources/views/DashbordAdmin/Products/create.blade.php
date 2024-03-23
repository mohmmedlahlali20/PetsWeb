@extends('Admin')
@section('title' , 'Add Products')

@section('content')
<h1 class="text-center mb-5 mt-5 font-bold">@yield('title')</h1>
@include('DashbordAdmin.Products.form')

{{-- @foreach($categories as $category)
<option value="{{ $category->id }}">{{ $category->name }}</option>
@endforeach --}}
@endsection