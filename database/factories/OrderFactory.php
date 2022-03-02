<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'showroom'=>rand(1,10),
            'order_code'=>$this->faker->unique()->numerify('##########'),
            'customer_id'=>rand(1,50),
            'order_date'=>now(),	
        ];
    }
}
