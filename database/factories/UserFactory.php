<?php

namespace Database\Factories;

use App\Models\User;
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
        $roles = ['admin', 'karyawan', 'user'];
        return [
            'fullname'          => fake()->name(),
            'email'             => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password'          => '$2y$10$Lli9zOMRwhVKfYfIaPGtDOTlmUVvE49p9lzLU11hwAuqDSmbjuodW', // password
            'role'              => $this->faker->randomElement($roles),
            'nomor'             => Str::random(12),
            'gambar'            => '240201080800.png',
            'tgllahir'          => $this->faker->date('Y-m-d'),
            'verify_key'        => 'duCrLr3XHSVWVLVGEYOujmGfUGSRPk4phHEWaSV2n1zUa1xaL8XJvanBKFan05SxYFeakvOWDXxPl2tMfFggk6WUut5pnvYr3cjm',
            'remember_token'    => Str::random(10),
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
