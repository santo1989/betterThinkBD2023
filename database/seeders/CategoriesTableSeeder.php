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
            
        ]);
        \App\Models\Category::create([
            'title' => 'Pharmacy',
        ]);
        \App\Models\Category::create([
            'title' => 'Super Shop',
        ]);
        \App\Models\Category::create([
            'title' => 'Hotel',
        ]);
        \App\Models\Category::create([
            'title' => 'Travel',
        ]);
        \App\Models\Category::create([
            'title' => 'Restaurant',
        ]);

    }
}
