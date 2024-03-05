<?php

namespace Database\Seeders;

use App\Models\Penjualan_detail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penjualan_detail::truncate();
        Penjualan_detail::create([
            'penjualan_id' => 1,
            'produk_id' => 1,
            'qty' => 1,
            'harga_beli' => 1000,
            'harga_jual' => 1100,
        ]);
        Penjualan_detail::create([
            'penjualan_id' => 2,
            'produk_id' => 1,
            'qty' => 1,
            'harga_beli' => 1000,
            'harga_jual' => 1100,
        ]);
        Penjualan_detail::create([
            'penjualan_id' => 3,
            'produk_id' => 2,
            'qty' => 1,
            'harga_beli' => 2000,
            'harga_jual' => 2200,
        ]);
        Penjualan_detail::create([
            'penjualan_id' => 4,
            'produk_id' => 2,
            'qty' => 1,
            'harga_beli' => 2000,
            'harga_jual' => 2200,
        ]);
        Penjualan_detail::create([
            'penjualan_id' => 5,
            'produk_id' => 3,
            'qty' => 1,
            'harga_beli' => 3000,
            'harga_jual' => 3300,
        ]);
        Penjualan_detail::create([
            'penjualan_id' => 6,
            'produk_id' => 3,
            'qty' => 1,
            'harga_beli' => 3000,
            'harga_jual' => 3300,
        ]);
    }
}
