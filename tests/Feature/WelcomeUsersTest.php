<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeUsersTest extends TestCase
{
    /* @test */
    function test_it_welcomes_users_with_nickname()
    {
        $this->get('/usuarios/Reg_nickname/Pollo')
        ->assertStatus(200)
        ->assertSee('Tu apodo es: Pollo');
    }

    /* @test */
    function test_it_welcomes_users_without_nickname()
    {
        $this->get('/usuarios/Reg_name/Carlos')
        ->assertStatus(200)
        ->assertSee('Tu nombre es: Carlos');
    }
}
