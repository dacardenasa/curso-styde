<?php

namespace App\Http\Controllers;

use App\User;
use http\Env\Response;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class UserController extends Controller
{
    //Index
    public function index()
    {

        //$users = DB::table('users')->get();

        $users = User::all();

        $title = 'Listado de usuarios';

        //   return view('users.index')
        //       ->with('users', User::all())
        //       ->with('title', 'Listado de usuarios');
        //     }

        return view('users.index', compact('title', 'users'));

    }

    public function show(User $user) {

            return view('users.show', compact('user'));


    }

    public function edit($id) {

        return "Proceso de edicion del usuario: {$id}";

    }

    public function create() {

        return view('users.create');
        
    }

    public function store(Request $request) {

        $data = $request->all();

        $validateData = $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'El campo nombre es obligatorio',
        ]);

        User::create([
           'name' => $data['name'],
           'email' => $data['email'],
            'profession_id' => $data['profesion'],
            'is_admin' => $data['perfil'],
            'password' => bcrypt($data['password']),
        ]);

        return redirect()->route('users');

    }

    public function login($id) {

        return "Su codigo de usuario en el sistema es: {$id}"; 
        
    }

    public function LoadUserForm() {

        return view('users_form');

    }

    public function CreateUser(Request $request) {

        $name = $request->input('user_name');
        $correo = $request->input('user_email');
        $password = $request->input('user_password');
        $password2 = $request->input('user_password_again');
        $profession = $request->input('user_profession');


        if($password == $password2) {

            User::CreateUser($name, $correo, $password, $profession);

            $respuesta = 'Usuario creado con exito';

            return view('welcome', ['respuesta' => $respuesta]);

        } else {

            $respuesta = 'Las contraseñas ingresadas para el usuario: '. $name .' no coinciden, por favor ingrese las mismas contraseñas  en los campos';

            return view('welcome', ['respuesta' => $respuesta]);

        }

    }

    public function GetUsersList() {

        $datos = User::GetDataList();

        return  view('listar_users_form', ['datos' => $datos]);

    }

    public function UpdateUserCont($id) {

        $datos = User::GetInfoToUpdate($id);

        return view('users_update', ['datos' => $datos, 'id' => $id]);

    }

    public function UpdateUserInfo(Request $request) {

        $user_id = $request->input('user_id');
        $name = $request->input('user_name');
        $email = $request->input('user_email');
        $password = $request->input('user_password');
        $password2 = $request->input('user_password_again');
        $profession = $request->input('user_profession');

        $respuesta = '';

        if($password == $password2) {

            $respuesta = User::SaveInfoToUpdate($user_id, $name, $email, $password, $profession);

            return view('welcome', ['respuesta' => 'El usuario: '.$name.' se actualizo de forma correcta']);

        } else {

            $respuesta = 'Las contraseñas ingresadas para el usuario: '. $name .' no coinciden, por favor ingrese las mismas contraseñas  en los campos';

            return view('welcome', ['respuesta' => $respuesta]);

        }

    }

    public function DeleteUserCont($id) {

        $user_id = $id;

        if($user_id) {

            $respuesta = User::DeleteUserModel($user_id);

            return view('welcome', ['respuesta' => $respuesta]);
        }

    }

    public function GetDataUser(Request $request) {

        $email = $request->input('user_email');

        $email2 = $request->input('user_email_del');

        if($email AND $email != "0"){

        $datos = User::join('professions', 'professions.id', '=' ,'profession_id')
            ->select('*', 'professions.title as profesion')
            ->where('email', $email)
            ->get();


        $consulta = true;

        $respuesta = "";

        if(count($datos)  > 0) {

            return view ('users_edit_form', ['datos' => $datos, 'consulta' => $consulta]);

        } else {

            $respuesta = "El correo electronico: ". $email . " no se encuentra registrado en la Base de datos";

            return view('welcome', ['respuesta' => $respuesta]);

        }

        } else if($email2 AND $email2 != "0") {

            $datos = User::join('professions', 'professions.id', '=' ,'profession_id')
                ->select('*', 'professions.title as profesion')
                ->where('email', $email2)
                ->get();


            $consulta = true;

            $respuesta = "";

            if(count($datos)  > 0) {

                return view ('eliminar_users_form', ['datos' => $datos, 'consulta' => $consulta]);

            } else {

                $respuesta = "El correo electronico: ". $email2 . " no se encuentra registrado en la Base de datos";

                return view('welcome', ['respuesta' => $respuesta]);

            }


        }

    }
}
