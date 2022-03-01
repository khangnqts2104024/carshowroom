<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer_Info>
 */
class Customer_InfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email'=>$this->faker->unique()->safeEmail(),						
            'citizen_id'=>$this->faker->unique()->numerify('0203######'),
           'fullname'=>$this->faker->name,
           'address'=>$this->faker->address,
           'phone_number'=>$this->faker->unique()->numerify('09#-#######'),
            'created_at' => now(),
            'updated_at' => now(),
           
        ];
    }
}
