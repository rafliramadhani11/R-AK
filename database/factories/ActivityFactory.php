<?php

namespace Database\Factories;

use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $positions = Position::all();
        return [
            'activity_name' => fake()->words(5, true),
            'sub_activity' => fake()->words(3, true),
            'task' => fake()->word(),
            'position_id' => $positions->random()->id
        ];
    }
}
