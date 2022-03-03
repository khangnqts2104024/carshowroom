<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Database\Seeders\UserSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    
     public function run()
    {
        $this->call(CustomerInfoSeeder::class);
      $this->call(warehouseSeeder::class);
      $this->call(showroomSeeder::class);
      $this->call(OrderSeeder::class);
      $this->call(ModelInfoSeeder::class);
      $this->call(OrderDetailSeeder::class);
      $this->call(CarInfoSeeder::class);
      $this->call(EmployeeInfoSeeder::class);
      $this->call(UserSeeder::class);
      $this->call(EmployeeAccountSeeder::class);
      $this->call(StockSeeder::class);
      
    }

}
