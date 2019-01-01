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
            'cpf'           => '03657536108',
            'name'          => 'Luiz Augusto Oliveira',
            'phone'         => '982401010',
            'birth'         => '1992-01-09',
            'gender'        => 'M',
            'email'         => 'oliveira.augusto@outlook.com',
            'password'      => bcrypt('123456'),
        ]);
    }
}
