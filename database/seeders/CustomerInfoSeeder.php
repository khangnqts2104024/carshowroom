<?php

namespace Database\Seeders;
use App\Models\Customer_Info;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          Customer_Info::factory()->times(50)->create();
    }
}
