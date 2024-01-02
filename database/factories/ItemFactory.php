<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Item;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Item::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'item_code' => $this->faker->unique()->randomNumber(5),
            'item_desc' => $this->faker->sentence(),
            'item_price' => $this->faker->randomFloat(2, 1, 1000),
            'item_group' => $this->faker->numberBetween(1, 4),
        ];
    }
}
