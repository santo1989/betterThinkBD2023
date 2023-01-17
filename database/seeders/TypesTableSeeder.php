<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'name' => 'level_1',
        ]);
        Type::create([
            'name' => 'level_2',
        ]);
        Type::create([
            'name' => 'level_3',
        ]);
        Type::create([
            'name' => 'level_4',
        ]);
        Type::create([
            'name' => 'level_5',
        ]);
        Type::create([
            'name' => 'level_6',
        ]);
        Type::create([
            'name' => 'register',
        ]);
    }
}
