@extends('Layouts.Admin')
@section('title' , 'All Category')

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
    <form method="POST" action="{{ route('category.store') }}">
        @csrf
      <div class="mb-3">
        <label for="category" class="form-label custom-form-label">Name</label>
        <input
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