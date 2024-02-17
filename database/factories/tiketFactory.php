<?php

namespace Database\Factories;

use App\Models\categori;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\tiket>
 */
class TiketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_tiket' => $this->faker->name(),
            'harga_tiket' => $this->faker->numberBetween(1, 100),
            'jumlah_tiket' => $this->faker->numberBetween(1, 100),
            'kategori_id' => function () {
                // return categori::all()->random();
                return Kategori::inRandomOrder()->first()->id;
            },
            'jenis_tiket' => $this->faker->name(),
        ];
    }
}
