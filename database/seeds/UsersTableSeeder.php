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
            'name' => 'Juan',
            'lastName'=>'Lopez',
            'email' => 'correo@correo.com',
            'password' => bcrypt('123123'),
            'level' => 2
        ]);
        User::create([
            'name' => 'Carlos',
            'lastName'=>'Ortiz',
            'email' => 'carlos@correo.com',
            'password' => bcrypt('12345'),
            'level' => 2
        ]);
        User::create([
            'name' => 'Ramos',
            'lastName'=>'Salitre',
            'email' => 'ramos@correo.com',
            'password' => bcrypt('123123'),
            'level' => 4
        ]);
    }
}
