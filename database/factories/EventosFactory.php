<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

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
        $gallery = $this->faker->image('public/images/eventos/gallery', 640, 480);
        $thumb = $this->faker->image('public/images/eventos/thumb', 640, 480);
        return [
            'title' => fake()->sentence(3),
            'locale' => fake()->region(),
            'date' => fake()->date(),
            'slug' => Str::slug(fake()->sentence(3)),
            'user_id' => User::pluck('id')->random(),
            'content' => fake()->paragraph(),
            'gallery' => str_replace('public', '', $gallery),
            'thumb' => str_replace('public', '', $thumb),

        ];
    }
}
