<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Product::class;
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'detail' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 100, 2000),
            'stock' => $this->faker->randomDigit,
            'discount' => $this->faker->numberBetween(2, 30),
            'user_id' => function () { //for getting a random user from the users table
                return User::all()->random();
            }
        ];
    }
}
