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
        'model_id'=>rand(1,5),
        'order_id'=>rand(1,500),
        'order_price'=>random_int(500000,1500000),
        'order_status'=>Arr::random(['ordered','sold','canceld','custcanceled','confirm','checked','deposited']),
        
        ];
    }
}
