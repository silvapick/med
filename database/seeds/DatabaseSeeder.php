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
            'cedula'  => '1110515706',
            'nombres'  => 'Oscar',
            'apellidos'  => 'Espitia',
            'email'     => 'odespitia@gmail.com',
            'email_verified_at' => now(),
            'password'  => bcrypt('123456'),
            'estado'  => '1',
            'remember_token' => Str::random(10)
        ]);
        DB::table('users')->insert([
            'cedula'  => '123456',
            'nombres'  => 'Usuario',
            'apellidos'  => 'Prueba',
            'email'     => 'prueba@gmail.com',
            'email_verified_at' => now(),
            'password'  => bcrypt('123456'),
            'estado'  => '1',
            'remember_token' => Str::random(10)
        ]);
    }
}
