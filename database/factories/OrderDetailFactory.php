<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        
        'model_id'=>rand(1,5),
        'order_id'=>rand(1,50),
        'order_price'=>$this->random_int(500000,1500000),
        
       	
        
        ];
    }
}
