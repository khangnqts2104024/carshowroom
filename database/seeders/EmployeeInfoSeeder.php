<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\employeeInfo;
class EmployeeInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
       
       
        
      
                //  tao admin

        //  DB::table('employee_infos')->insert([
        //     [
        //     'email'=>'admin@gmail.com',	
        //     'fullname'=>'Nguyễn Quốc Khang',					
        //     'address'=>'100 Hoàn Kiếm Hà Nội',
        //     'phone_number'=>'0902333434',
        //     'emp_branch'=>'1',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ],]);
        //    mo ra chay cau này

        employeeInfo::factory()->times(50)->create();
    }
}
