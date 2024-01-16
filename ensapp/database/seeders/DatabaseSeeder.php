<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Inscription;
use App\Models\User;
use App\Models\Module;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Créez un utilisateur et un professeur pour chaque professeur spécifié
        $this->createTeacher('Hassan', 'BARKIA', 'Tech Web et Multimedias');
        $this->createTeacher('Fouad', 'KHAROUBI', 'Didactique et micro-enseignement');
        $this->createTeacher('Abdelali', 'MOUNADI', 'Structures de donnees');
        $this->createTeacher('Mohamed', 'RAHMOUNI', 'Bases de donnees');
        $this->createTeacher('Mustapha', 'GHASSOUB', 'Psychopedagogie');

        // Créez 60 étudiants et une inscription à chacun
        User::factory()->count(60)->create()->each(function ($user) {
            $student = Student::factory()->create(['user_id' => $user->id]);
            Inscription::factory()->create(['student_id' => $student->id]);
        });
        
        // Créez les modules
        $modules = [
            ['module_name' => 'Technologies web', 'description' => 'Module sur les technologies web.', 'duration' => rand(20, 30), 'teacher_id'=> 1],
            ['module_name' => 'Didactique et micro-enseignement', 'description' => 'Module sur la didactique et le micro-enseignement.', 'duration' => rand(20, 30), 'teacher_id'=> 2],
            ['module_name' => 'Multimedias', 'description' => 'Module sur les médias numériques.', 'duration' => rand(20, 30), 'teacher_id'=> 1 ],
            ['module_name' => 'Structures de données', 'description' => 'Module sur les structures de données.', 'duration' => rand(20, 30), 'teacher_id'=> 3 ],
            ['module_name' => 'Bases de donnees', 'description' => 'Module sur les bases de données.', 'duration' => rand(20, 30), 'teacher_id'=> 4 ],
            ['module_name' => 'Psychopedagogie', 'description' => 'Module sur la psychopédagogie.', 'duration' => rand(20, 30), 'teacher_id'=> 5],
        ];

        foreach ($modules as $module) {
            Module::factory()->create($module);
        }
    }

    private function createTeacher($prenom, $nom, $specialization)
    {
        // Créez un utilisateur
        $user = User::factory()->create([
            'prenom' => $prenom,
            'nom' => $nom,
            'email' => strtolower($prenom . '.' . $nom . '@ens.um5.ma'),
            'password' => Hash::make(strtolower($prenom . '.' . $nom . '@ens.um5.ma')),
        ]);

        // Créez un professeur associé à l'utilisateur
        Teacher::factory()->create([
            'specialization' => $specialization,
            'user_id' => $user->id,
        ]);
    }
}
