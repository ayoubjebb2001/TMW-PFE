<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        DB::table('users')->insert([
            'prenom' => 'Abdallah',
            'nom' => 'ISMAILI',
            'phone' => '0787654526',
            'CIN' => 'DDD101201',
            'email' => 'ais.devlop@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'prenom' => $faker->firstName,
                'nom' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'CIN' => $faker->text(10),
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
