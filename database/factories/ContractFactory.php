<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contract>
 */
class ContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::all();
        $status = ['Berjalan', 'Tidak Berjalan'];
        return [
            'no_contract' => fake()->numerify('#/PPK/PN.0#.0#'),
            'start_contract' => fake()->date(),
            'end_contract' => fake()->date(),
            'status' => Arr::random($status),
            'salary' => fake()->randomFloat(2, 2000000, 10000000),
            'user_id' => $users->random()->id
        ];
    }
}
