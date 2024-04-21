<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} | Success Payment</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/c0bae2ffa6.js" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mb-5">
        <div class="text-center bg-success p-5 rounded my-5 shadow text-white mb-5">
            <i class="fas fa-check-circle fa-5x"></i>
            <h1 class="mt-3">Success Payment</h1>
            <p class="lead">Thank you for your purchase!</p>
            <a class="btn btn-primary" href="{{ route('Home.index') }}">Back to Home</a>
        </div>
      
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h1 class="card-title">Payment Successful</h1>
                        <p class="card-text">Thank you for your purchase!</p>
                        <div class="bg-light rounded p-3 mb-3">
                            {!! $qrcode !!}
                        </div>
                        <h4>Products:</h4>
                        <ul class="list-group">
                            @foreach ($productCounts as $productName => $count)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $productName }} ({{ $count }})
                                    <i class="fa fa-paw fa-2x text-gray-300"></i>  
                                </li>
                            @endforeach
                        </ul>
                        <p class="mt-3">Total Price: <b>{{ $totalPrice }}</b> MAD</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>
