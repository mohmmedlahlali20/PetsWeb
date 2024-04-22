@extends('Layouts.Admin')
@section('title', 'Payment Invoice')

@section('content')
<div class="container">
    <h2>Payment Invoice</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>User</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>
                        @if ($item->Commends->product)
                            {{ $item->Commends->product->name }}
                        @elseif($item->Commends->accessoir)
                            {{ $item->Commends->accessoir->name }}
                        @elseif ($item->Commends->food)
                            {{ $item->Commends->food->name }}
                        @endif
                    </td>
                    <td>
                        @if ($item->Commends->product)
                            {{ $item->Commends->user->name }}
                        @elseif($item->Commends->accessoir)
                            {{ $item->Commends->user->name }}
                        @elseif ($item->Commends->food)
                            {{ $item->Commends->user->name }}
                        @endif
                    </td>
                    <td>
                        @if ($item->Commends->product)
                        {{ $item->Commends->product->price }}MAD
                    @elseif($item->Commends->accessoir)
                        {{ $item->Commends->accessoir->price }}MAD
                    @elseif ($item->Commends->food)
                        {{ $item->Commends->food->price }}MAD
                    @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-6">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Total:</th>
                        <td>${{ $total }}</td>
                    </tr>
                    <tr>
                        <th>Payment Method:</th>
                        <td>{{ $paymentMethod }}</td>
                    </tr>
                    <tr>
                        <th>Transaction ID:</th>
                        <td>{{ $transactionID }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
