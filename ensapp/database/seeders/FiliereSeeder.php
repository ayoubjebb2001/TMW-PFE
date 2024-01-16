<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FiliereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filieres = [
            [
                'filiere_name' => 'TMW',
                'description' => 'Technologies du Multimédia et du Web',
                'capacity' => 30,
            ],
            [
                'filiere_name' => 'CLE',
                'description' => 'Some Example Description',
                'capacity' => 25,
            ],
            // Add more filieres as needed
        ];

        foreach ($filieres as $filiere) {
            DB::table('filieres')->insert([
                'filiere_name' => $filiere['filiere_name'],
                'description' => $filiere['description'],
                'capacity' => $filiere['capacity'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
