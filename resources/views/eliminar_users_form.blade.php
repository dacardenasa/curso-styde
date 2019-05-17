<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Eliminar Usuarios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/main.css') }}" />
    <script src="main.js"></script>
</head>
<body>
<h1>ELIMINAR USUARIOS</h1>

<div class="container">

    <form class="form-group" action="{{ url('/usuarios/buscar_user/') }}" method="GET" autocomplete="off">
        <!--
            Se debe agregar un campo oculto tipo hidden para enviar un formulario en laravel
        -->
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="form-group">
            <label class="sr-only" for="email ">Email:</label><br>
            <input class="form-control" type="email" id="user_email" name="user_email_del" placeholder="Ingrese su Correo electronico del usuario a eliminar" required>
            <input class="form-control" type="hidden" name="user_email" value="0">

        </div>
        <div style="text-align:center;">
            <button class="btn-primary" type="submit" value="Send Request">Consultar Registro</button>
        </div>
    </form>

    @if(isset($consulta))

        @foreach($datos as $dato)

            <form class="form-group" action="{{ url('usuarios/UserDelete/'.$dato->user_id) }}" method="GET" autocomplete="off">
                <!--
                    Se debe agregar un campo oculto tipo hidden para enviar un formulario en laravel
                -->
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-group">
                    <label class="sr-only" for="Username">Username:</label><br>
                    <input class="form-control" type="text" id="user_name" name="user_name" value="{{ $dato->name }}" required>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="email ">Email:</label><br>
                    <input class="form-control" type="email" id="user_email" name="user_email" value="{{ $dato->email }}" required>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="profes">Profesion actual:</label><br>
                    <input class="form-control" type="text" id="profes" name="profes" value="{{$dato->profesion}}" disabled>
                </div>
                <div style="text-align:center;">
                    <button class="btn-primary" type="submit" value="Delete User">Eliminar Registro</button>
                </div>
            </form>

        @endforeach

    @endif


</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>