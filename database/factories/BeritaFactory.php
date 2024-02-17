<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\artikel>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence(),
            'isi'   => $this->faker->paragraph(5, true),
            'image' => 'download.jpg',
            'user_id' => function () {
                // return categori::all()->random();
                return User::inRandomOrder()->first()->id;
            },

        ];
    }
}
