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

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h1 class="card-title">Payment Success</h1>
                        <p class="card-text">Thank you for your purchase!</p>
                        <div class="bg-light rounded p-3 mb-3">
                            {!! $qrcode !!}
                        </div>
                        <h4>Products:</h4>
                        <ul class="list-group">
                            @foreach ($productCounts as $productName => $count)
                                <li class="list-group-item">{{ $productName }} ({{ $count }})</li>
                            @endforeach
                        </ul>
                        <p>Total Price: {{ $totalPrice }} MAD</p>
                        <a class="btn btn-success" href="{{ route('Home.index') }}">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
