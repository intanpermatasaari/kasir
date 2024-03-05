<?php

namespace Database\Seeders;

use App\Models\Toko;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Toko::truncate();
        Toko::create([
            'nama_toko' => 'Toko 1',
            'alamat' => fake()->address(),
            'tlp_hp' => fake()->phoneNumber(),
        ]);
        Toko::create([
            'nama_toko' => 'Toko 2',
            'alamat' => fake()->address(),
            'tlp_hp' => fake()->phoneNumber(),
        ]);
        Toko::create([
            'nama_toko' => 'Toko 3',
            'alamat' => fake()->address(),
            'tlp_hp' => fake()->phoneNumber(),
        ]);
    }
}
