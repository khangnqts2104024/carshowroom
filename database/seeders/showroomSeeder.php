<?php

namespace Database\Seeders;

use App\Models\showroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class showroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('showrooms')->insert([
            [
                'showroom_name'=> 'warehouse',
                'address'=>'headoffice',
                'phone'=>'XXXXXXXXX',
                'region'=>1,
            ],
            ]);
         showroom::factory()->times(11)->create();
    }
}
