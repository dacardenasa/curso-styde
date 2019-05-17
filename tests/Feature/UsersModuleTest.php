<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersModuleTest extends TestCase
{

   use RefreshDatabase;

    /* @test */
    function test_it_shows_the_users_list()
    {
        factory(User::class)->create([
            'name' => 'Joel',
        ]);

        factory(User::class)->create([
            'name' => 'Ellie',
        ]);

        $this->get('/usuarios')
             ->assertStatus(200)
             ->assertSee('Listado de usuarios')
             ->assertSee('Joel')
             ->assertSee('Ellie');

    }

    /* @test
    function test_it_shows_a_default_message_if_the_users_list_is_empty()
    {
        $this->get('/usuarios')
        ->assertStatus(200)
        ->assertSee('No hay usuarios registrados.');
    }*/

    /* @test */
    function it_displays_the_users_details()
    {
        $user = factoty(User::class)->create([
            'name' => 'Diego Cardenas'
        ]);

        $this->get('/usuarios/'.$user->id)
        ->assertStatus(200)
        ->assertSee('Diego Cardenas');
    }

    /* @test */
    function test_it_displays_a_404_error_if_the_user_is_not_found()
    {
        $this->get('/usuarios/999')
            ->assertStatus(404)
            ->assertsee('Usuario no encontrado');
    }



    /* @test */
    function test_it_loads_the_new_users_page()
    {
        $this->withoutExceptionHandling();
        $this->get('/usuarios/nuevo')
        ->assertStatus(200)
        ->assertSee('Crear nuevo usuario');
    }

    /* @test */
    function test_it_user_login_page()
    {
        $this->withoutExceptionHandling();
        $this->get('/usuarios/login/85')
        ->assertStatus(200)
        ->assertSee('Su codigo de usuario en el sistema es: 85');
    }

    /* @test */
    function test_it_creates_a_new_user()
    {
        $this->withoutExceptionHandling();

        $this->post('/usuarios/', [
            'name' => 'Diego',
            'email' => 'diego.cardenasaleg@hotmail.es',
            'password' => 'pass',
        ])->assertRedirect(route('users'));

        $this->assertCredentials([
            'name' => 'Diego',
            'email' => 'diego.cardenasaleg@hotmail.es',
            'password' => 'pass',
        ]);

    }

        /* @test */
        function test_field_name_is_required()
        {
            $this->from('usuarios/nuevo')
            ->post('/usuarios/', [
                'name' => '',
                'email' => 'diego.cardenasaleg@hotmail.es',
                'password' => 'pass',
            ])
                ->assertRedirect(route('users.create'))
                ->assertSessionHasErrors(['name' => 'El campo nombre es obligatorio']);

            $this->assertEquals(0, User::count());

            /*
            $this->assertDatabaseMissing('users', [
               'email' => 'diego.cardenasaleg@gmail.com',
            ]);
            */
    }



}
