<?php

namespace Database\Factories;

use App\Models\tiket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\transaksitiket>
 */
class TransaksitiketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'tiket_id' => function () {
                // return categori::all()->random();
                return tiket::inRandomOrder()->first()->id;
            },
            'qty' => $this->faker->numberBetween(1, 30),
            'status' => $this->faker->numberBetween(0, 1),
        ];
    }
}
