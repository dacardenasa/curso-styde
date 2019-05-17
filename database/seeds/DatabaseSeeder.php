<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        //Borra el contenido de las tablas users, profession profession antes de insertar  registros
        $this->TruncateTables([
            'users',
            'professions'
            ]);
        //Llama y ejecuta la clase con la que deseamos trabajar
        $this->call(ProfessionSeeder::class);
        $this->call(UserSeeder::class);

    }

    protected function TruncateTables(array $tables) {
        //Desactiva la directiva de  llaves foraneas en la DB
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        
        foreach($tables as $table):
            //Borra todos los registros en la tabla
            DB::table($table)->truncate();
        endforeach;

        //Activa nuevamente la directiva de  llaves foraneas en la DB
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        
    }

}
