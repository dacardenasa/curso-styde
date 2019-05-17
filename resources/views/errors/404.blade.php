@extends('layouts.layout')

@section('title', "Error 404")

@section('content')

    <div class="row justify-content-center my-3">
        <div class="col-4">
            <div class="card">
                <img src="{{asset('img/error.png')}}" class="card-img-top img-fluid" alt="Imagen">
                <div class="card-body">
                    <h1 class="card-title">Usuario no encontrado</h1>
                    <p class="card-text">El usuario no fue encontrado en la base de datos, por favor vuelva  a intentarlo</p>
                    <a href="{{route('users')}}" class="btn btn-primary d-block btn-lg">Volver al listado de usuarios</a>
                </div>
            </div>

        </div>
    </div>

@endsection