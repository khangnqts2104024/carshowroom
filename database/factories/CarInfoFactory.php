<?php

namespace Database\Factories;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarInfo>
 */
class CarInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'car_model'=>rand(1,5),
            'car_branch'=>rand(1,10),
            'order_id'=>rand(1,100),
            'manufactoring_date'=>$this->faker->dateTimeBetween('2021-01-02 00:00:00'),
            'car_status' => Arr::random(['pending','sold','showroom','custcanceled']),
        ];
    }
}
