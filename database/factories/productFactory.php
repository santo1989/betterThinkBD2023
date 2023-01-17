<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class productFactory extends Factory
{
   protected  $model = Product::class;
    public function definition()
    {

        return [
            'title' => $this->faker->name,
            'description1' => $this->faker->paragraph,
            'description2' => $this->faker->paragraph,
            'short_address' => $this->faker->address,
            'long_address' => $this->faker->address,
            'point_needed' => $this->faker->numberBetween(1001, 2000),
            'discount_amount' => $this->faker->numberBetween(1, 15),

            'logo' => $this->faker->imageUrl(400, 300, 'cats', true, 'Faker', true),
            'image' => $this->faker->imageUrl(400, 300, 'cats', true, 'Faker', true),
            'category_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
