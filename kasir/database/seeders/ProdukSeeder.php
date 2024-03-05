<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produk::truncate();
        Produk::create([
            'toko_id' => 1,
            'nama_produk' => 'Kopi',
            'kategori_id' => 1,
            'stok' => 198,
            'satuan' => 'Pcs',
            'harga_beli' => 1000,
            'harga_jual' => 1100,
        ]);
        Produk::create([
            'toko_id' => 2,
            'nama_produk' => 'Rokok',
            'kategori_id' => 2,
            'stok' => 198,
            'satuan' => 'Pack',
            'harga_beli' => 2000,
            'harga_jual' => 2200,
        ]);
        Produk::create([
            'toko_id' => 3,
            'nama_produk' => 'Mie Instan',
            'kategori_id' => 3,
            'stok' => 198,
            'satuan' => 'Dus',
            'harga_beli' => 3000,
            'harga_jual' => 3300,
        ]);
    }
}
