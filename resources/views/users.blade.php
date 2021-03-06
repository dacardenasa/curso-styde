<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/main.css') }}" />
    <script src="main.js"></script>
</head>
<nav>
    <div class="logo">
        <img src="{{ asset('css/main.css') }}" alt="">
    </div>
    <div class="menu">
        <ul>
            <li><a href="#">INICIO</a></li>
            <li><a href="#">PORTAFOLIO</a></li>
            <li><a href="#">SERVICIOS</a></li>
            <li><a href="#">ABOUT US</a></li>
        </ul>
    </div>
</nav>
<body>
    <h1>{{$title}}</h1>

    <hr>
    <div class="contenedor">
        <ul>
            @foreach($users as $user)
                <li>{{ $user->name }}</li>
                <li>{{ $user->email }}</li>
                <li>{{ $user->profession_id }}</li>
            @endforeach
        </ul>
    </div>
    <hr>
</body>
</html>