<?php

namespace Database\Seeders;

use App\Models\Point;
use Illuminate\Database\Seeder;

class PointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Point::create([
            'type_id' => '1',
            'point' => '300',
        ]);
        Point::create([
            'type_id' => '2',
            'point' => '200',
        ]);
        Point::create([
            'type_id' => '3',
            'point' => '100',
        ]);
        Point::create([
            'type_id' => '4',
            'point' => '70',
        ]);
        Point::create([
            'type_id' => '5',
            'point' => '60',
        ]);
        Point::create([
            'type_id' => '6',
            'point' => '50',
        ]);
        Point::create([
            'type_id' => '7',
            'point' => '2000',
        ]);
    }
}
