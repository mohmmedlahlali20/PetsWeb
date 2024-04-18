@extends('Layouts.Admin')
@section('title' , 'All command')

@section('content')
<div class="cart">
    <h2>Cart</h2>
    <ul>
        @foreach($items as $item)
            <li>
                @if($item->product)
                    {{ $item->product->name }} - ${{ $item->price }}
                @else
                    No product associated - ${{ $item->price }}
                @endif
            </li>
        @endforeach
    </ul>
    
    <p>Total: ${{ $total }}</p>
 
</div>
@endsection
