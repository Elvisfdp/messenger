<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'juan',
            'email' => 'correo@correo.com',
            'password' => bcrypt('123123')
        ]);
        User::create([
            'name' => 'Carlos',
            'email' => 'carlos@correo.com',
            'password' => bcrypt('12345')
        ]);
    }
}
