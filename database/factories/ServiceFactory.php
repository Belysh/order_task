<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'product_id' => random_int(Product::all()->first()->id, Product::all()->last()->id),
            'user_id' => random_int(User::all()->first()->id, User::all()->last()->id),
            'created_at' => now(),
        ];
    }
}
