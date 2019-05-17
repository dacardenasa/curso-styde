<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return 'Home';
});

Route::get('/usuarios', 'UserController@index')->name('users');

Route::get('/usuarios/{user}', 'UserController@show')
    ->where('user', '[0-9]+')
    ->name('users.show');

Route::get('/usuarios/login/{id}', 'UserController@login');

Route::get('/usuarios/editar/{id}', 'UserController@edit');

Route::get('/usuarios/nuevo', 'UserController@create')->name('users.create');

Route::post('/usuarios/', 'UserController@store')->name('usuarios.crear');


//Rutas de otras pruebas no styde

Route::get('/usuarios/administracion', function(){

    return view('menu_users');

});

Route::post('/usuarios/users_form', 'UserController@CreateUser');

Route::get('/usuarios/users_form', 'UserController@LoadUserForm');

Route::get('/usuarios/Reg_name/{name}', 'WelcomeUserController@Create_Name');

Route::get('/usuarios/Reg_nickname/{nickname}', 'WelcomeUserController@Create_Nickname');

Route::get('/usuarios/mostrar_usuarios', 'UserControlInfo@ShowDataUser');

Route::get('/usuarios/crear_usuarios', 'UserControlInfo@InsertDataUser');

Route::get('/usuarios/actualizar_usuarios', 'UserControlInfo@UpdateDataUser');

Route::get('/usuarios/eliminar_usuarios', 'UserControlInfo@DeleteDataUser');

Route::get('/usuarios/users_edit_form', function(){

    return view('users_edit_form');

});

Route::get('/usuarios/listar_users_form', 'UserController@GetUsersList');

Route::get('/usuarios/eliminar_users_form', function(){

    return view('eliminar_users_form');

});

Route::get('/usuarios/UserUpdateInfo/{id}/', 'UserController@UpdateUserCont');

Route::post('/usuarios/users_update_form/', 'UserController@UpdateUserInfo');

Route::get('/usuarios/UserDelete/{id}/', 'UserController@DeleteUserCont');

Route::get('/usuarios/buscar_user/', 'UserController@GetDataUser');










