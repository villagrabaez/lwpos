<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DenominationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(['MONEDA', 'BILLETE', 'OTRO']),
            'value' => $this->faker->randomDigit(),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
