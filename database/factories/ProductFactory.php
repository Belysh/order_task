<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'cores_number' => $this->faker->randomDigit(),
            'memory_size' => $this->faker->randomDigit(),
            'disk_size' => $this->faker->randomDigit(),
            'created_at' => now(),
        ];
    }
}
