<?php

use App\Models\Profession;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         *
        Consultas sin constrctor de consultas SQL
        DB::insert('INSERT INTO profession (title) VALUES (:title)', [
            'title' => 'Desarrollador Front-End'
        ]);

        Consultas con constructor de consultas #endregion SQL
        Inserta informacion en la columna titulo de la tabla
         DB::table('profession')->insert([
          'title' => 'Desarrollador Back-End',
        ]);

        Inserta informacion en la columna titulo de la tabla
        DB::table('professions')->insert([
            'title' => 'Desarrollador Front-End',
        ]);
        Inserta informacion en la columna titulo de la tabla
        DB::table('professions')->insert([
            'title' => 'Diseñador Web',
        ]);

        **/

        //Metodo insert realizada con el modelo Profession

        Profession::create([
            'title' => 'Desarrollador Back-End',
        ]);

        Profession::create([
            'title' => 'Desarrollador Front-End',
        ]);

        Profession::create([
            'title' => 'Desarrollador Full-Stack',
        ]);

    }
}
