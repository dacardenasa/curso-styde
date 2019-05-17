<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GetDataInfo extends Model
{

    protected $table = 'users';

    protected $fillable = ['name', 'email', 'password', 'profession_id'];

    //Funcion la cual obtiene todos los registro de la tabla users en la DB

    public static function GetUser() {

        $users = GetDataInfo::all();

        /*$users = GetDataInfo
                 ::join('professions' , 'id' )
                 ->on('users', 'profession_id')
                 ->select('name', 'email', 'profession_id')
                 ->getQuery()->get();
    */
        return $users;
    }

    //Funcion la cual inserta registros en la tabla users en la DB

    /**
     * @return string
     */
    public static function InsertUser() {

        $estado_registro = GetDataInfo::create(['name' => 'Karla Giraldo',
                                                'email' => 'karla001@gmail.com',
                                                'password' => bcrypt('asd123456'),
                                                'profession_id' => '3']);


        if ($estado_registro) {
            return ('La informacion fue guardada de forma exitosa!');
        } else {
            return ('Hubo un problema al insertar la informacion');
        }

    }

    //Funcion la cual actualiza registros en la tabla users en la DB

    public static function UpdateUser() {

        $updatedata = GetDataInfo::findOrFail(2);

        $updatedata->name = 'Michael Cabrera';

        $updatedata->email = 'michaelspeed@hotmail.es';

        $updatedata->password = bcrypt('asdfertt');

        $updatedata->profession_id = '3';

        $updatedata->save();

    }

    //Funcion la cual elimina registros en la tabla users en la DB

    public static function DeleteUser() {

        $deleteuser = GetDataInfo::findOrFail(1);

        $deleteuser->delete();

    }


}
