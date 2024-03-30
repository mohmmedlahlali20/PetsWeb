<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/c0bae2ffa6.js" crossorigin="anonymous"></script>
    
    <title>{{ config('app.name')  }} </title>
</head>
<body>
    @guest
  
    @endguest
    href="{{ route('login') }}"
    href="{{ route('register') }}
    href="{{ route('Home.index') }}
</body>
</html>