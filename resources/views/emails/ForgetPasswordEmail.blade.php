<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Add custom CSS styles here */
        body {
            font-family: Arial, sans-serif;
        }
        .card-header {
            background-color: #f8f9fa;
            padding: 20px;
            display: flex;
            align-items: center;
        }
        .card-header img {
            max-width: 100px;
            margin-right: 20px;
        }
        .card-title {
            font-size: 24px;
            font-weight: bold;
        }
        .card-text {
            font-size: 16px;
            color: #6c757d;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <img src="{{ $message->embed($imagePath) }}" alt="Logo">
                        <h4 class="card-title mb-0">{{ config('app.name') }}</h4>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Password Reset</h4>
                        <p class="card-text">Hello,</p>
                        <p class="card-text">We received a request to reset your password. If you did not make this request, you can ignore this email.</p>
                        <p class="card-text">To reset your password, please click on the following link:</p>
                        <a href="{{ route('reset.password', $token) }}" class="btn btn-primary">Reset Password</a>
                        <p class="card-text mt-2">If you're having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser:</p>
                        <p class="card-text">{{ route('reset.password', $token) }}</p>
                        <p class="card-text">This link will expire in 24 hours for security reasons.</p>
                        <p class="card-text">Thank you!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
