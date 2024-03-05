<?php

namespace Database\Seeders;

use App\Models\Pembelian_detail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PembelianDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pembelian_detail::truncate();
        Pembelian_detail::create([
            'pembelian_id' => 1,
            'produk_id' => 1,
            'qty' => 100,
            'harga_beli' => 100000,
        ]);
        Pembelian_detail::create([
            'pembelian_id' => 2,
            'produk_id' => 2,
            'qty' => 100,
            'harga_beli' => 200000,
        ]);
        Pembelian_detail::create([
            'pembelian_id' => 3,
            'produk_id' => 3,
            'qty' => 100,
            'harga_beli' => 300000,
        ]);
    }
}
