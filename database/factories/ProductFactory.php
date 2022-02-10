<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'barcode' => $this->faker->randomNumber(),
            'cost' => $this->faker->randomDigit(),
            'price' => $this->faker->randomDigit(),
            'stock' => $this->faker->randomDigit(),
            'alerts' => $this->faker->randomDigit(),
            'image' => $this->faker->imageUrl(),
            'category_id' => Category::all()->random()->id,
        ];
    }
}
