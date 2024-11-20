<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::all();
        return [
            'start' => fake()->time('H:i:s'),
            'middle' => fake()->time('H:i:s'),
            'end' => fake()->time('H:i:s'),
            'user_id' => $users->random()->id
        ];
    }
}
