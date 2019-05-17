@extends('layouts.layout')

@section('title', "Usuario {$user->user_id}")

@section('content')

    <div class="row justify-content-center mt-3">
        <div class="col-6">

            <h1 class="text-center">Usuario #{{ $user->user_id }}</h1>

            <table class="table table-active ">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>email</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $user->user_id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-6">
           <a href="{{ route('users') }}" class="btn btn-primary btn-lg d-block">Volver al listado de usuarios</a>
        </div>
    </div>

@endsection