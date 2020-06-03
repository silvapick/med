<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'cedula'  => '1110489449',
            'nombres'  => 'Fabian Leonardo',
            'apellidos'  => 'Silva Bonilla',
            'email'     => 'flsilvab@gmail.com',
            'email_verified_at' => now(),
            'password'  => bcrypt('123456789'),
            'estado'  => '1',
            'remember_token' => Str::random(10)
        ]);
        DB::table('users')->insert([
            'cedula'  => '123456789',
            'nombres'  => 'Usuario',
            'apellidos'  => 'Prueba',
            'email'     => 'prueba@gmail.com',
            'email_verified_at' => now(),
            'password'  => bcrypt('123456789'),
            'estado'  => '1',
            'remember_token' => Str::random(10)
        ]);

        DB::table('tipo_medicamentos')->insert([
            'nombre'  => 'Medicamentos POS',
            'estado'  => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tipo_medicamentos')->insert([
            'nombre'  => 'Medicamentos NO POS',
            'estado'  => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
