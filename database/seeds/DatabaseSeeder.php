<?php

use Illuminate\Database\Seeder;
use App\Entities\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'cpf'           => '03657536109',
            'name'          => 'Luiz Augusto Oliveir',
            'phone'         => '982401010',
            'birth'         => '1992-01-09',
            'gender'        => 'M',
            'email'         => 'oliveir.augusto@outlook.com',
            'password'      => env('PASSWORD_HASH') ? bcrypt('123456') : '123456',
        ]);
    } 
}
