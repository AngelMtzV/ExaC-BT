<?php

use Illuminate\Database\Seeder;

class tipoUsuarioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipousuarios')->insert([
            'nombre' => 'Administrador',
        ]);
        DB::table('tipousuarios')->insert([
            'nombre' => 'Standar',
        ]);
    }
}
