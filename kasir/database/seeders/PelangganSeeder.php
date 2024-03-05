<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelanggan::truncate();
        Pelanggan::create([
            'toko_id' => 1,
            'nama_pelanggan' => fake()->name(),
            'alamat' => fake()->address(),
            'no_hp' => fake()->phoneNumber(),
        ]);
        Pelanggan::create([
            'toko_id' => 2,
            'nama_pelanggan' => fake()->name(),
            'alamat' => fake()->address(),
            'no_hp' => fake()->phoneNumber(),
        ]);
        Pelanggan::create([
            'toko_id' => 3,
            'nama_pelanggan' => fake()->name(),
            'alamat' => fake()->address(),
            'no_hp' => fake()->phoneNumber(),
        ]);
    }
}
