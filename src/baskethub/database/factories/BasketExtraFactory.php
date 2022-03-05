<?php

namespace Database\Factories;

use App\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BasketItem;
use App\Models\Customer;
use Illuminate\Support\Str;

class BasketExtraFactory extends Factory
{
    public function definition(): array
    {
        $myBasketItems = DB::table("basket_items")
                            ->where("customer_id", auth()->user()->id)
                            ->first();
    	return [
            "token" => $this->faker->randomElement($myBasketItems->token),
            "object_type" => config("enums.object_types.giftPackaged"),
            "object_id" => $this->faker->numberBetween(1, 5),
            "promotion_code" => Str::random(6),
            "quantity" => $this->faker->numberBetween(1, 5),
            "price" => $this->faker->numerify('##.##'),
            "tax" => $this->faker->numerify('##.##'),
    	];
    }
}
