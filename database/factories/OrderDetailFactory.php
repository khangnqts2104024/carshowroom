<?php

namespace Database\Factories;
use Illuminate\Support\Arr;
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
        'model_id'=>rand(1,15),
        'order_id'=>rand(1,300),
        'order_price'=>Arr::random([500000000,600000000,830000000,1000000000,940000000]),
        'order_status'=>Arr::random(['ordered','deposited']),
        
        ];
    }
}
