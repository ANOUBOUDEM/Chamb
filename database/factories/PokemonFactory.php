<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pokemon>
 */
class PokemonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'hp' => $this->faker->numberBetween(50, 200),
            'weight' => $this->faker->randomFloat(2, 5, 100),
            'height' => $this->faker->randomFloat(2, 0.5, 2),
            'image' => $this->faker->imageUrl(100, 100),
        ];
    }
}
