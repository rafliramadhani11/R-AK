<?php

namespace Database\Factories;

use App\Models\Contract;
use App\Models\Position;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $positions = Position::all();
        $contracts = Contract::all();
        $gender = ['Laki - Laki', 'Perempuan'];

        return [
            'email' => fake()->freeEmail(),
            'password' => Hash::make(123),
            'name' => fake()->name(),
            'gender' => Arr::random($gender),
            'phone' => fake()->numerify('08##########'),
            'address' => fake()->address(),
            'job_place' => fake()->citySuffix(),
            'id_phl' => fake()->numerify('########'),

            'position_id' => $positions->random()->id,
            'contract_id' => $contracts->random()->id
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
