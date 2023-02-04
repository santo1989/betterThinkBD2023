<?php

namespace Database\Seeders;

use App\Models\Hand;
use Illuminate\Database\Seeder;

class HandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hand::create([
            "parent_id" => 1,
            "child_id" => 2,
        ]);
    
    }
}
