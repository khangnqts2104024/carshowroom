<?php

namespace Database\Seeders;

use App\Models\warehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class warehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('warehouses')->insert([
        [
        'warehouse_name'=>'Miền Bắc',
        'address'=>'12 Hoàn Kiếm Hà Nội',
        'phone'=>'0902333444',],
        [
        'warehouse_name'=>'Miền Nam',
        'address'=>'12 Hàm Nghi Q1 TP Hồ Chí Minh',
        'phone'=>'0903222555',
        ],
        [
        'warehouse_name'=>'Miền Trung',
        'address'=>'12 Tran Phú Q1 Đà Nẵng',
        'phone'=>'0903222555',
        ],]);
    }
}
