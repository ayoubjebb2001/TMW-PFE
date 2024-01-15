<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $prenom = fake()->firstName ;
        $nom = fake()->lastName;
        $email = strtolower($prenom . '.' . $nom . '@ens.um5.ma');
        return [
            'prenom' => $prenom,
            'nom' => $nom,
            'date_naissance' => fake()->date,
            'Phone' => fake()->e164PhoneNumber(),
            'email' => $email,
            'password' => Hash::make($email)
        ];
    }
}
