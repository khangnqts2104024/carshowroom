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
            'showroom'=>rand(1,11),
            'order_code'=>$this->faker->unique()->numerify('##########'),
            'customer_id'=>rand(1,500),
            'order_date'=>$this->faker->dateTimeBetween('2021-01-01 00:00:00'),	
        ];
    }
}
