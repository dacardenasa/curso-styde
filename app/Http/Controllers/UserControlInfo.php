<?php

namespace App\Http\Controllers;
use App\GetDataInfo;
use Illuminate\Http\Request;

class UserControlInfo extends Controller
{
    //

    public function showDataUser() {

        $users = GetDataInfo::GetUser();

        return view('users', ['users' => $users,
                                    'title' => 'Listado de Usuarios',
                                    'respuesta' => $respuesta]);

    }

    public function InsertDataUser() {

        $respuesta = GetDataInfo::InsertUser();

        return view('users_reg', ['title' => 'Registro de Usuarios',
                                        'numero' => $i,
                                        'respuesta' => $respuesta]);

    }

    public function UpdateDataUser() {

        $respuesta = GetDataInfo::UpdateUser();

        return view ('users_update', (['title' => 'Actualizar Usuario',
                                            'respuesta' => $respuesta]));

    }

    public function DeleteDataUser() {

        $respuesta = GetDataInfo::DeleteUser();

        return view('users_delete', ['title' => 'Eliminar Usuario',
                                            'respuesta' => $respuesta]);

    }


}


