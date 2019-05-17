<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/main.css') }}" />
    <title>Formulario Registro Usuarios</title>
</head>
<body>

<div class="container">

    <h1>Formulario Actualizacion Datos</h1>

        @foreach($datos as $dato)

            <form class="form-group" action="{{ url('/usuarios/users_update_form/') }}" method="POST" autocomplete="off">
                <!--
                    Se debe agregar un campo oculto tipo hidden para enviar un formulario en laravel
                -->
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <input type="hidden" name="user_id" value=" {{ $id }} ">
                <div class="form-group">
                    <label class="sr-only" for="Username">Username:</label><br>
                    <input class="form-control" type="text" id="user_name" name="user_name" value="{{ $dato->name }}" required>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="email ">Email:</label><br>
                    <input class="form-control" type="email" id="user_email" name="user_email" value="{{ $dato->email }}" required>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="password ">Password:</label><br>
                    <input class="form-control" type="password" id="user_password" name="user_password" placeholder="Digite su nueva Contraseña" required>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="password ">Confirme su password:</label><br>
                    <input class="form-control" type="password" id="user_password_again" name="user_password_again" placeholder="Digite nuevamente su Contraseña" required>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="profes">Profesion actual:</label><br>
                    <input class="form-control" type="text" id="profes" name="profes" value="{{$dato->profesion}}" disabled>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="profession ">Seleccione una Profesion:</label><br>
                    <select class="form-control" name="user_profession" id="user_profession">
                        <option value="1">Desarrollador BackEnd</option>
                        <option value="2">Desarrollador FrontEnd</option>
                        <option value="3">Desarrollador FullStack</option>
                    </select>
                </div>
                <div style="text-align:center;">
                    <button class="btn-primary" type="submit" value="Update User">Update User</button>
                </div>
            </form>

         @endforeach

</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
</body>
</html>