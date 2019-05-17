@extends('layouts.layout')

@section('title', "Usuario {$title}")

@section('content')

    <div class="row justify-content-center mt-3">
        <div class="col-6">
            <h1 class="text-center">Tabla de Usuario</h1>
            <table class="table table-active ">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)

                        <tr>
                            <td>{{ $user->user_id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <a href="{{ route('users.show', ['id' => $user->user_id]) }}"><i class="far fa-eye"></i></a>
                                <a href="{{ route('users', ['id' => $user->user_id]) }}"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('users', ['id' => $user->user_id]) }}"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>

@endsection
