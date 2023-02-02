<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Category::factory(3)->create();
        \App\Models\Category::create([
            'title' => 'Hospital',
            'image' => 'hospital.jpg',
            
        ]);
        \App\Models\Category::create([
            'title' => 'Pharmacy',
            'image' => 'pharmacy.jpg',
        ]);
        \App\Models\Category::create([
            'title' => 'Super Shop',
            'image' => 'SuperShop.jpg',
        ]);
        \App\Models\Category::create([
            'title' => 'Hotel',
            'image' => 'Hotel.jpg',
        ]);
        \App\Models\Category::create([
            'title' => 'Travel',
            'image' => 'Travel.jpg',
        ]);
        \App\Models\Category::create([
            'title' => 'Restaurant',
            'image' => 'Restaurant.jpg',
        ]);

    }
}
