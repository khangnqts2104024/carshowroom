<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeeInfo>
 */
class EmployeeInfoFactory extends Factory
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
           'fullname'=>$this->faker->name,
           'address'=>$this->faker->address,
           'phone_number'=>$this->faker->unique()->numerify('09#-#######'),
           'emp_branch'=>rand(1,12),
           'salary'=>Arr::random([10000000,12000000,9000000,15000000,8000000]),
            'created_at' => now(),
            'updated_at' => now(),
            		



        ];
    }
}
