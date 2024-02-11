<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // \App\Models\artikel::factory(20)->create();
        // \App\Models\categori::factory(20)->create();
        // \App\Models\tiket::factory(20)->create();
        // \App\Models\rute::factory(20)->create();
        // \App\Models\transaksi::factory(20)->create();
        \App\Models\transaksitiket::factory(20)->create();
    }
}
