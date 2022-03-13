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
            'showroom'=>rand(1,20),
            'order_code'=>$this->faker->unique()->numerify('ORDER-###'.time()),
            'momo_id'=>$this->faker->unique()->numerify('###'.time()),
            'customer_id'=>rand(1,150),
            'order_date'=>$this->faker->dateTimeBetween('2021-01-01 00:00:00'),	
        ];
    }
}
