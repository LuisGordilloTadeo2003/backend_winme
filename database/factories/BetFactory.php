<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Bet;
use App\Models\Group;
use App\Models\User;

class BetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bet::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'description' => fake()->text(),
            'closesAt' => fake()->dateTime(),
            'startsAt' => fake()->dateTime(),
            'isPublic' => fake()->boolean(),
            'status' => fake()->randomElement(["active","complete","waiting"]),
            'user_id' => User::factory(),
            'group_id' => Group::factory(),
        ];
    }
}
