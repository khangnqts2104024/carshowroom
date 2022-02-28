<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class Customer_infos_Table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,5) as $index){
            DB::table('customer_infos')->insert([
                'email' => $faker->name.'@gmail.com',
                'citizen_id'=>rand(2,5000),
                'fullname'=>$faker->name,
                'phone_number'=>rand(5,6000),
                'address'=>$faker->address,
            ]);
        }
        
    }
}
