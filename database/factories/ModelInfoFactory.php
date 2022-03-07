<?php

namespace Database\Factories;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ModelInfo>
 */
class ModelInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'model_name'=>Arr::random(['PRESIDENT','LUX SA2.0','LUX A2.0','FADIL','VF e34']),
            'color'=>Arr::random(['red','black','white']),
        ];
    }
}
