<?php

namespace Database\Seeders;

use App\Models\Pembelian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PembelianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pembelian::truncate();
        Pembelian::create([
            'toko_id' => 1,
            'user_id' => 2,
            'no_faktur' => 1,
            'tanggal_pembelian' => '2024-02-23',
            'suplier_id' => 1,
            'total' => 100,
            'bayar' => 100000,
            'sisa' => 0,
            'keterangan' => 'Lunas',
        ]);
        Pembelian::create([
            'toko_id' => 2,
            'user_id' => 4,
            'no_faktur' => 2,
            'tanggal_pembelian' => '2024-02-23',
            'suplier_id' => 2,
            'total' => 100,
            'bayar' => 200000,
            'sisa' => 0,
            'keterangan' => 'Lunas',
        ]);
        Pembelian::create([
            'toko_id' => 3,
            'user_id' => 6,
            'no_faktur' => 3,
            'tanggal_pembelian' => '2024-02-23',
            'suplier_id' => 3,
            'total' => 100,
            'bayar' => 300000,
            'sisa' => 0,
            'keterangan' => 'Lunas',
        ]);
    }
}
