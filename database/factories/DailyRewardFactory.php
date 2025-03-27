<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\DailyReward;

class DailyRewardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DailyReward::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'reward' => fake()->word(),
            'accumulation' => fake()->numberBetween(-10000, 10000),
            'lastLogin' => fake()->dateTime(),
        ];
    }
}
