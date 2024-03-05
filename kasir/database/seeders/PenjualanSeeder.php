<?php

namespace Database\Seeders;

use App\Models\Penjualan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penjualan::truncate();
        Penjualan::create([
            'toko_id' => 1,
            'user_id' => 2,
            'tanggal_penjualan' => '2024-02-23',
            'pelanggan_id' => 1,
            'total' => 1,
            'bayar' => 1100,
            'sisa' => 100,
            'keterangan' => 'Lunas',
        ]);
        Penjualan::create([
            'toko_id' => 1,
            'user_id' => 3,
            'tanggal_penjualan' => '2024-02-23',
            'pelanggan_id' => 1,
            'total' => 1,
            'bayar' => 1100,
            'sisa' => 100,
            'keterangan' => 'Lunas',
        ]);
        Penjualan::create([
            'toko_id' => 2,
            'user_id' => 4,
            'tanggal_penjualan' => '2024-02-23',
            'pelanggan_id' => 2,
            'total' => 1,
            'bayar' => 2200,
            'sisa' => 200,
            'keterangan' => 'Lunas',
        ]);
        Penjualan::create([
            'toko_id' => 2,
            'user_id' => 5,
            'tanggal_penjualan' => '2024-02-23',
            'pelanggan_id' => 2,
            'total' => 1,
            'bayar' => 2200,
            'sisa' => 200,
            'keterangan' => 'Lunas',
        ]);
        Penjualan::create([
            'toko_id' => 3,
            'user_id' => 6,
            'tanggal_penjualan' => '2024-02-23',
            'pelanggan_id' => 3,
            'total' => 1,
            'bayar' => 3300,
            'sisa' => 300,
            'keterangan' => 'Lunas',
        ]);
        Penjualan::create([
            'toko_id' => 3,
            'user_id' => 7,
            'tanggal_penjualan' => '2024-02-23',
            'pelanggan_id' => 3,
            'total' => 1,
            'bayar' => 3300,
            'sisa' => 300,
            'keterangan' => 'Lunas',
        ]);
    }
}
