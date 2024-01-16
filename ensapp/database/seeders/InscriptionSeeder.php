<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $userIds = \App\Models\User::pluck('id')->toArray();
        $filiereIds = \App\Models\Filiere::pluck('id')->toArray();


        foreach ($userIds as $userId) {
            foreach ($filiereIds as $filiereId) {
                $bacNote = $faker->numberBetween(10, 20);
                $deplomeNote = $faker->numberBetween(10, 20);

                DB::table('inscriptions')->insert([
                    'user_id' => $userId,
                    'filiere_id' => $filiereId,
                    'status' => 'Pinned',
                    'bac_note' => $bacNote,
                    'deplome' => $faker->word,
                    'deplome_year' => $faker->year,
                    'deplome_note' => $deplomeNote,
                    'file_path' => 'storage/uploads/1705431112_EDT LP_TMW_S5_2023_24 (1).pdf',
                    'score' => ($bacNote + $deplomeNote) / 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
