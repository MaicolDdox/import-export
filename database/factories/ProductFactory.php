<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> fake()->word(),
            'category' => fake()->randomElement(['Frutas', 'Electronica', 'Electrica', 'Pesado', 'Manual', 'Automatico']),
            'stock_max' => fake()->numberBetween(1, 10),
            'stock_min' => fake()->numberBetween(100, 1000),
            'date' => fake()->dateTimeBetween('-1 year', 'now'),
            'created_at' => now(),
            'updated_at' => now(), 
        ];
    }
}
