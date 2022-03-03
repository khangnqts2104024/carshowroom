<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('customer_accounts')->insert([
        [
        'email'=>'customer@gmail.com',	
        'email_verified_at' => now(),
        'password' => '$2y$10$PK/rCp4hXGOzeYZfUwnu8uuyVqlyp779HowEQr0QxfG3OLUGESrtO', // password 123456
        'remember_token' => Str::random(10),
    ],]);
    }
}
