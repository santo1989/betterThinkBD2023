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
            'details' => 'You have got 300 points for level 1',
        ]);
        Point::create([
            'type_id' => '2',
            'point' => '200',
            'details' => 'You have got 200 points for level 2',
        ]);
        Point::create([
            'type_id' => '3',
            'point' => '100',
            'details' => 'You have got 100 points for level 3',
        ]);
        Point::create([
            'type_id' => '4',
            'point' => '70',
            'details' => 'You have got 70 points for level 4',
        ]);
        Point::create([
            'type_id' => '5',
            'point' => '60',
            'details' => 'You have got 60 points for level 5',
        ]);
        Point::create([
            'type_id' => '6',
            'point' => '50',
            'details' => 'You have got 50 points for level 6',
        ]);
        Point::create([
            'type_id' => '7',
            'point' => '2000',
            'details' => 'Admin have got 2000 points for New User Registration',
        ]);
    }
}
