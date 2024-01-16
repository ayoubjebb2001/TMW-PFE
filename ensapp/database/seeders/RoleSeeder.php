<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $userIds = \App\Models\User::pluck('id')->toArray();

        DB::table('roles')->insert([
            'user_id' => 1,
            'role_name' => 'chef',
            'Specialization' => 'Full-stack',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        foreach ($userIds as $userId) {
            DB::table('roles')->insert([
                'user_id' => $userId,
                'role_name' => $faker->randomElement(['teacher', 'student']),
                'Specialization' => $faker->word,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
