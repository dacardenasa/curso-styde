<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Listar Usuarios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/main.css') }}" />
    <script src="main.js"></script>
</head>
<body>
<h1>LISTAR USUARIOS</h1>

<div class="container">

    <table class="table table-hover table-sm table-striped table-active">
        <thead>
        <tr>
            <th scope="col">User Id</th>
            <th scope="col">User Name</th>
            <th scope="col">Email</th>
            <th scope="col">Profession</th>
            <th scope="col">Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($datos as $data)
            <tr>
                <th scope="row">{{ $data->user_id }}</th>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->profesion }}</td>
                <td>
                    <a href="{{ 'UserUpdateInfo/'.$data->user_id }}"><i class="fas fa-user-edit"></i></a>
                    <a href="{{ 'UserDelete/'.$data->user_id }}"><i class="fas fa-user-times"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.7.1/js/all.js" integrity="sha384-eVEQC9zshBn0rFj4+TU78eNA19HMNigMviK/PU/FFjLXqa/GKPgX58rvt5Z8PLs7" crossorigin="anonymous"></script>
</body>
</html>