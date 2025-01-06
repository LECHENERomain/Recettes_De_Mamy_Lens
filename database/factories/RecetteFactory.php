<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recette>
 */
class RecetteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users_id = User::all()->pluck('id');
        return [
            'nom' => $this->faker->randomElement(['Couscous', 'Boeuf bourguignon', 'Cookies', 'Confiture de cerises']),
            'description' => $this->faker->sentence(15, true),
            'categorie' => $this->faker->randomElement(['Plat principal', 'Dessert', 'Confiture']),
            'visuel' => $this->faker->randomElement(['image1.png', 'image2.png', 'image3.png']),
            'temps_preparation' => $this->faker->randomElement(['1', '2', '3', '4', '5', '6', '7']),
            'nb_personnes' => $this->faker->randomElement(['1', '2', '4', '6', '8']),
            'cout' => $this->faker->randomElement(['1', '2', '3', '4', '5']),
            'user_id' => $this->faker->randomElement($users_id),
        ];
    }
}




