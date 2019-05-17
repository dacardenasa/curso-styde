<?php

namespace App;

use App\Models\Profession;
use Illuminate\Notifications\Notifiable;

use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profession_id',
    ];

    protected $casts = [
        'is_admin' => 'boolean'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function FindByEmail($email) {

        return static::where(compact('email'))->first();

    }

    public function profession() {

        return $this->belongsTo(Profession::class);

    }

    public function isAdmin() {

        return $this->is_admin;
    }

    public static function CreateUser($user, $correo,  $password, $profesion) {

        $user_val = User::where('email', $correo)->get()->count();

        if($user_val > 0) {

            return 'El usuario con el correo: ' . $correo . ' ya se encuentra registrado en la base de datos!';

        } else {

            User::create(['name' => $user,
                'email' => $correo,
                'password' => bcrypt($password),
                'profession_id' => $profesion,

            ]);

            $profession_name = '';

            switch ($profesion) {

                case '1':
                    $profession_name = 'Desarrollador Back-End';
                    break;
                case '2':
                    $profession_name = 'Desarrollador Front-End';
                    break;
                case '7':
                    $profession_name = 'Desarrollador FullStack';
                    break;
                default:
                    'La profesion no existe en nuestra base de datos';
            }

            return 'El usuario ' . $user . ' se registro de manera exitosa en la base de datos con el perfil de: '. $profession_name;

        }


    }

    public static function GetInfoToUpdate($id) {

        $datos = User::join('professions', 'professions.id', '=' ,'profession_id')
                        ->select('*', 'professions.title as profesion')
                        ->where('user_id', $id)
                        ->get();

        return $datos;

    }

    public static function SaveInfoToUpdate($id, $name, $email, $pass, $profession) {

        $userdata = User::where('user_id', $id)->first();
        $userdata->name = $name;
        $userdata->email = $email;
        $userdata->password = bcrypt($pass);
        $userdata->profession_id = $profession;
        $userdata->save();

        return $userdata;

    }


    public static function GetDataList(){

        $datos = User::join('professions', 'professions.id', '=' ,'profession_id')
                        ->select('*', 'professions.title as profesion')
                        ->orderBy('user_id', 'ASC')
                        ->get();

        return $datos;
    }

    public static function DeleteUserModel($id) {

        $user = User::where('user_id', $id)->first();

        $user->delete();

        $respuesta = 'EL usuario: '.$user->name.' fue eliminado de la  base de datos';

        return $respuesta;

    }

}
