<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $thumb = $this->faker->image('public/images/posts', 640, 480);

        return [
            'title' => fake()->sentence(3),
            'slug' => Str::slug(fake()->sentence(3)),
            'user_id' => User::pluck('id')->random(),
            'content' => fake()->paragraph(),
            'thumb' => str_replace('public', '', $thumb),
        ];
    }
}
