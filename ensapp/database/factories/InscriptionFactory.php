<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inscription>
 */
class InscriptionFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'etat_inscription' => $this->faker->randomElement(['admis', 'non admis', 'en attente']),
            'note_bac' => $this->faker->randomFloat(2, 0, 20),
            'annee_bac' => fake()->year(),
            'intitule_diplome' => $this->faker->randomElement(['BTS','DTS','DUT','DEUG','OFPPT']),
            'note_diplome' => $this->faker->randomFloat(2, 0, 20),
            'annee_diplome' => $this->faker->year,
            'student_id' => function () {
                return Student::factory()->create()->id;
            },
        ];
    }
}
