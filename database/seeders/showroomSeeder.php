<?php

namespace Database\Seeders;

use App\Models\showroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class showroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         showroom::factory()->times(11)->create();
    }
}
