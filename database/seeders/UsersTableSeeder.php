<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'role_id' => 1,
            'name' => 'Md',
            'uuid' => '0012-2022-0000-1001',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            'nid'=> '1234567890 ',
            'mobile'=> '01700000000',
            'dob'=> '',
            'sponsor_id'=> '0012-2022-0000-1001',
            'point'=> '10000000', 
            'payment_id'=> '0012-2022-0000-1001',
            'picture'=> 'admin.png', 
            'is_approved_sponsor'=> '1', 
            'is_approved_payment'=> '1',   
            'is_approve' =>'1',
        ]);
        User::create([
            'role_id' => 2,
            'name' => 'user',
            'uuid' => '0012-2022-0000-1002',
            'email' => 'user@user.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            'nid' => '1234567891 ',
            'mobile' => '01700000001',
            'sponsor_id' => '0012-2022-0000-1001',
            'point' => '0',
            'payment_id' => '0012-2022-0000-1001',
            'picture' => 'user.png',
            'is_approved_sponsor' => '1',
            'is_approved_payment' => '1',
            'is_approve' => '1',
        ]);
    }
}
