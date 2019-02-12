<?php

use Illuminate\Database\Seeder;

class UsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'edad' => 21,
            'domicilio' => str_random(10),
            'id_tipoUsuario' => 1,
        ]);

        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'edad' => 20,
            'domicilio' => str_random(10),
            'id_tipoUsuario' => 2,
        ]);
    }
}
