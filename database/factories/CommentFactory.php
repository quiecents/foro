<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->sentence(8),
            'user_id' => \App\Models\User::inRandomOrder()->first(),
            'post_id' => \App\Models\Post::inRandomOrder()->first(),
        ];
    }
}
