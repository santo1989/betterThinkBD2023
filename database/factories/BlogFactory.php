<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    protected $model = Blog::class;
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'post' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(400, 300, 'cats', true, 'Faker', true),
            // 'image' => $this->faker->image('public/images/blogs', 400, 300, null, false),
            'user_id' => $this->faker->numberBetween(1, 2),
            'author' => $this->faker->name,
        ];
    }
}
