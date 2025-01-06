<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingredient>
 */
class IngredientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->randomElement(['Salade', 'Tomate', 'Oignon', 'Ail', 'Piment', 'Carotte']),
            'nature' => $this->faker->randomElement(['Légume', 'Condiment', 'Fruit']),
            'visuel' => $this->faker->randomElement(['image1.png', 'image2.png', 'image3.png']),
        ];
    }
}
