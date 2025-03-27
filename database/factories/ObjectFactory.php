<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Object;

class ObjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Object::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'type' => fake()->word(),
            'rarity' => fake()->randomElement(["common","special","legendary","impossible"]),
            'price' => fake()->numberBetween(-10000, 10000),
            'isPremium' => fake()->boolean(),
        ];
    }
}
