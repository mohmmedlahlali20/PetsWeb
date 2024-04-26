@extends('Layouts.Admin')
@section('title' , ($IsUpdte ? 'Update' : 'Create') . ' Products')

@php
    $route = $IsUpdte ? route('category.update', $category->id) : route('category.store');
    //dump($route);
@endphp

@section('content')
<style>
    /* Custom CSS */
    .custom-heading {
      font-size: 2rem;
      color: #333;
      text-align: center;
      margin-bottom: 30px;
    }

    .custom-form-label {
      font-weight: bold;
      color: #666;
    }

    .custom-btn {
      float: right;
    }
</style>

<div class="container">
    <h1 class="custom-heading">Add Category</h1>
    <form class="mt-5 mb-5" method="POST" action="{{ $route }}">
        @csrf
        @if ($IsUpdte)
        @method('PUT')
        @endif
        <div class="mb-3">
            <label for="category" class="form-label custom-form-label">Name</label>
            <input
            value="{{ old('name') }}"
            type="text"
            class="form-control"
            name="name"
            id="category"
            placeholder="Enter category name"
        />
        </div>
        <button type="submit" class="btn btn-primary custom-btn">Add Category</button>
    </form>
</div>

@endsection
