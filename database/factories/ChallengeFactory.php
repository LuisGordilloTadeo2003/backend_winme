<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Challenge;
use App\Models\Group;

class ChallengeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Challenge::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'challengeType' => fake()->word(),
            'status' => fake()->randomElement(["active","complete","waiting"]),
            'startsAt' => fake()->dateTime(),
            'closesAt' => fake()->dateTime(),
            'group_id' => Group::factory(),
        ];
    }
}
