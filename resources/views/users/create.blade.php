@extends('layouts.layout')

@section('title', "Crear Usuario")

@section('content')

    <div class="row justify-content-center my-3 bg-light">
        <div class="col-6">
            <h1 class="text-primary text-center">Crear Usuario</h1>
            <form action="{{route('usuarios.crear')}}" method="POST" autocomplete="off">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="Nombre">Nombre Usuario:</label>
                    <input type="text" class="form-control" name="name" placeholder="Escribe tu nombre" required>
                </div>
                <div class="form-group">
                    <label for="Email">Correo Electronico:</label>
                    <input type="email" class="form-control" name="email" placeholder="Escribe tu email" required>
                </div>
                <div class="form-group">
                    <select name="profesion" class="form-control" required>
                        <option value="#">Selecciona el perfil:</option>
                        <option value="1">Desarrollador Back-End</option>
                        <option value="2">Desarrollador Front-End</option>
                        <option value="3">Desarrollador Full-Stack</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="perfil" class="form-control" required>
                        <option value="#">Selecciona el role:</option>
                        <option value="0">Administrador</option>
                        <option value="1">Empleado</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" name="password" class="form-control" placeholder="Escriba su contraseña" required>
                </div>
                <div class="form-group">
                    <input type="password" name="Confirm-password" class="form-control" placeholder="Escriba nuevamente su contraseña" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar Datos</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-6">
            <a href="{{ route('users') }}" class="btn btn-primary btn-lg d-block">Volver al listado de usuarios</a>
        </div>
    </div>


@endsection