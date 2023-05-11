<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $roles = ['admin','lendingService', 'lender'];
        $userType =['staff', 'teacher', 'student'];
        return [
            'name' => fake()->name,
            'userType' => $userType[array_rand($userType)],
            'role' => $roles[array_rand($roles)],
            'email' => fake()->email(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
            'updated_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
