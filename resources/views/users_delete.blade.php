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

    <h1>{{ 'Usuario Eliminado' }}</h1>
</body>
</html>