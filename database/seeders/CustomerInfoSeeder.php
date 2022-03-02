<?php

namespace Database\Seeders;
use App\Models\Customer_Info;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CustomerInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('customer_infos')->insert([
            [
            'email'=>'customer@gmail.com',	
            'citizen_id'=>'090044382',
            'fullname'=>'Le Anh Trung',					
            'address'=>'100 Trường Trinh TP Hồ CHí MInh',
            'phone_number'=>'0902333434',
            'created_at' => now(),
            'updated_at' => now(),
        ],]);

        //   Customer_Info::factory()->times(50)->create();
    }
}
