<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\artikel>
 */
class transaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code_booking' => Str::random(10),
            'nama'   => $this->faker->name(),
            'total_pesan' => $this->faker->numberBetween(1, 100),
            'no_kursi' => $this->faker->numberBetween(1, 100),
            'tgl_pergi'   => $this->faker->date('Y-m-d'),
            'total_harga'   => $this->faker->numberBetween(1, 100),
            // 'tarif'   => $this->faker->numberBetween(1, 100),
            'waktu_pesan'   => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'status' => $this->faker->numberBetween(1, 100),
            'user_id' => function () {
                // return categori::all()->random();
                return User::inRandomOrder()->first()->id;
            },
        ];
    }
}
