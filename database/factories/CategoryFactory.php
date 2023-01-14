<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class CategoryFactory extends Factory
{
    protected $model = Category::class;
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(400, 300, 'cats', true, 'Faker', true),
        ];
       
    }
}
