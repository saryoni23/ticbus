<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\artikel>
 */
class ruteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kota_asal' => $this->faker->name(),
            'kota_tujuan'   => Str::random(10),
            'jam_berangkat' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'jam_tiba' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'kelas'   => $this->faker->numberBetween(1, 100),
            'seat'   => $this->faker->numberBetween(1, 100),
            'tarif'   => $this->faker->numberBetween(1, 100),
            'is_active'   => 1,
        ];
    }
}
