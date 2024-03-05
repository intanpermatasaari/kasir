<?php

namespace Database\Seeders;

use App\Models\Suplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Suplier::truncate();
        Suplier::create([
            'toko_id' => 1,
            'nama_suplier' => fake()->company(),
            'tlp_hp' => fake()->phoneNumber(),
            'alamat_suplier' => fake()->address(),
        ]);
        Suplier::create([
            'toko_id' => 2,
            'nama_suplier' => fake()->company(),
            'tlp_hp' => fake()->phoneNumber(),
            'alamat_suplier' => fake()->address(),
        ]);
        Suplier::create([
            'toko_id' => 3,
            'nama_suplier' => fake()->company(),
            'tlp_hp' => fake()->phoneNumber(),
            'alamat_suplier' => fake()->address(),
        ]);
    }
}
