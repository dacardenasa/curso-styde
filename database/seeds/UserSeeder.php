<?php

use App\User;
use App\Models\Profession;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Consulta realizada sin el connstructor de consultas SQL
        $profession = DB::select('SELECT id FROM profession WHERE title = ?',['Desarrollador Back-End']);*/ 

        $professionId = Profession::where('title', 'Desarrollador Front-End')->value('id');
        $professionId2 = Profession::where('title', 'Desarrollador Back-End')->value('id');
        $professionId3 = Profession::where('title', 'Desarrollador Full-Stack')->value('id');

        factory(User::class)->create([
            'name' => 'Lorena Lopez',
            'email' => 'lorena@gmail.com',
            'password' => bcrypt('laravel'),
            'profession_id' => $professionId,
            'is_admin' => true
        ]);

        factory(User::class)->create([
            'profession_id' => $professionId2
        ]);

        factory(User::class, 48)->create();
    }
}
