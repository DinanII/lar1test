<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = \App\Models\User::pluck('id')->toArray();
        $blogIds = \App\Models\Blog::pluck('id')->toArray();
        return [
            'title' => $this->faker->title(),
            'description' => $this->faker->text(),
            'user_id' => \App\Models\User::factory(),
            'blog_id' => \App\Models\Blog::factory(),
        ];
    }
}