<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => $this->faker->unique()->randomelement(User::all()->pluck("id")),
            'order_code' => mt_rand(100000, 999999),
            'customer_name' => $this->faker->name,
            'customer_surname' => $this->faker->name,
            'customer_email' => $this->faker->freeEmail,
        ];
    }
}
