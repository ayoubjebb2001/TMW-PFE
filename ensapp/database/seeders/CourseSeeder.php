<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = DB::table('modules')->get();

        foreach ($modules as $module) {
            for ($i = 1; $i <= 6; $i++) {
                DB::table('courses')->insert([
                    'module_id' => $module->id,
                    'course_name' => "Course {$i} for Module {$module->id}",
                    'description' => "Description for Course {$i}",
                    'duration' => '6',
                    'file_path' => 'storage/uploads/1705431112_EDT LP_TMW_S5_2023_24 (1).pdf',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
