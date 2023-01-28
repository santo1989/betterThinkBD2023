<?php

namespace Database\Seeders;

use App\Models\division;
use Illuminate\Database\Seeder;

class DivisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        division::create([
            "name" => "Chattagram", "bn_name" => "চট্টগ্রাম", "url" => "www.chittagongdiv.gov.bd"
        ]);
        division::create([
            "name" => "Rajshahi", "bn_name" => "রাজশাহী", "url" => "www.rajshahidiv.gov.bd"
        ]);
        division::create([
            "name" => "Khulna", "bn_name" => "খুলনা", "url" => "www.khulnadiv.gov.bd"
        ]);
        division::create([
            "name" => "Barisal", "bn_name" => "বরিশাল", "url" => "www.barisaldiv.gov.bd"
        ]);
        division::create([
            "name" => "Sylhet", "bn_name" => "সিলেট", "url" => "www.sylhetdiv.gov.bd"
        ]);
        division::create([
            "name" => "Dhaka", "bn_name" => "ঢাকা", "url" => "www.dhakadiv.gov.bd"
        ]);
        division::create([
            "name" => "Rangpur", "bn_name" => "রংপুর", "url" => "www.rangpurdiv.gov.bd"
        ]);
        division::create([
            "name" => "Mymensingh", "bn_name" => "ময়মনসিংহ", "url" => "www.mymensinghdiv.gov.bd"
        ]);
    }
}
