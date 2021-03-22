<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        User::create([
            'name' => 'teste1',
            'email' => 'teste@teste.com.br',
            'password' => Hash::make('teste1234'),
        ]);
    }
}