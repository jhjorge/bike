<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EventosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(3),
            'locale' => fake()->region(),
            'date' => fake()->date(),
            'content' => fake()->paragraph(),
            'gallery' => fake()->imageUrl(),
            'thumb' => fake()->imageUrl(),

        ];
    }
}
