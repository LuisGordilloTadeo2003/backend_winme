<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Group;
use App\Models\Level;

class GroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Group::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'maxMembers' => fake()->numberBetween(-10000, 10000),
            'picture' => fake()->word(),
            'isPublic' => fake()->boolean(),
            'invitationCode' => fake()->numberBetween(-10000, 10000),
            'isPremium' => fake()->boolean(),
            'dailyBets' => fake()->numberBetween(-10000, 10000),
            'points' => fake()->numberBetween(-10000, 10000),
            'description' => fake()->text(),
            'level_id' => Level::factory(),
        ];
    }
}
