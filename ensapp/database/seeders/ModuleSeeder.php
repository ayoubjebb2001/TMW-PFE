<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $tmwFiliereId = \App\Models\Filiere::where('filiere_name', 'TMW')->value('id');
        $cleFiliereId = \App\Models\Filiere::where('filiere_name', 'CLE')->value('id');

        $usersIds = \App\Models\User::pluck('id')->toArray();

        $informaticModules = [
            'Web Development',
            'Database Design',
            'Programming Fundamentals',
            'Data Structures',
            'Object-Oriented Programming',
            'Software Engineering',
            'Algorithms and Complexity',
            'Mobile App Development',
            'Cybersecurity',
            'Networks and Protocols',
            'Human-Computer Interaction',
            'Cloud Computing',
            'Artificial Intelligence',
            'Machine Learning',
            'Big Data Analytics',
            'Web Security',
            'E-commerce Technologies',
            'Internet of Things (IoT)',
            'DevOps Practices',
            'Blockchain Technology',
        ];
        

        foreach ($usersIds as $userId) {
            // Generate modules for TMW filiere
            for ($i = 0; $i < 20; $i++) {
                DB::table('modules')->insert([
                    'user_id' => $userId,
                    'filiere_id' => $tmwFiliereId,
                    'module_name' => $faker->randomElement($informaticModules),
                    'description' => $faker->sentence,
                    'duration' => $faker->randomElement(['1 semester', '2 semesters', '3 semesters', '4 semesters', '5 semesters', '6 semesters']),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Generate modules for CLE filiere
            for ($i = 0; $i < 20; $i++) {
                DB::table('modules')->insert([
                    'user_id' => $userId,
                    'filiere_id' => $cleFiliereId,
                    'module_name' => $faker->randomElement($informaticModules),
                    'description' => $faker->sentence,
                    'duration' => $faker->randomElement(['1 semester', '2 semesters', '3 semesters', '4 semesters', '5 semesters', '6 semesters']),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
