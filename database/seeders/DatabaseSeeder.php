<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Attendance;
use App\Models\Contract;
use App\Models\Position;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $gender = ['Laki - Laki', 'Perempuan'];

        // User::factory()->create([
        //     'email' => 'admin@mail.com',
        //     'password' => Hash::make(123),
        //     'name' => 'Admin',
        //     'gender' => Arr::random($gender),
        //     'phone' => fake()->numerify('08##########'),
        //     'address' => fake()->address(),
        //     'job_place' => fake()->citySuffix(),
        //     'id_phl' => fake()->numerify('########')
        // ]);

        Contract::factory(1)->create();
        Position::factory(2)->create();
        Activity::factory(1)->create();
        User::factory(5)->create();
        Attendance::factory(10)->create();
    }
}
