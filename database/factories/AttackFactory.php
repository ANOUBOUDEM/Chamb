<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attack>
 */
class AttackFactory extends Factory
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
            'damage' => $this->faker->numberBetween(10, 100),
            'description' => $this->faker->sentence,
            'type_id' => \App\Models\Type::factory(),
        ];
    }
}
