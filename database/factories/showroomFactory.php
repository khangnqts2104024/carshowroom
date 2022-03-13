<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\showroom>
 */
class showroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          
            'showroom_name'=>$this->faker->name(),
            'address'=>$this->faker->address,
            'phone'=>$this->faker->unique()->numerify('09########'),
            'region'=>rand(1,3),	
        ];
    }
}
