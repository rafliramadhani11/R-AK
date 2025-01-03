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
            'start_activity' => fake()->sentence(),

            'middle' => fake()->time('H:i:s'),
            'middle_activity' => fake()->sentence(),

            'end' => fake()->time('H:i:s'),

            'img_start' => fake()->imageUrl(640, 480, 'datang', true),
            'img_end' => fake()->imageUrl(640, 480, 'pulang', true),

            'user_id' => 4,
            'created_at' => fake()->dateTimeBetween('-1 week'),
        ];
    }
}
