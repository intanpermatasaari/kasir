<?php

namespace Database\Seeders;

use App\Models\Produk_kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produk_kategori::truncate();
        Produk_kategori::create([
            'nama_kategori' => 'Kategori 1',
        ]);
        Produk_kategori::create([
            'nama_kategori' => 'Kategori 2',
        ]);
        Produk_kategori::create([
            'nama_kategori' => 'Kategori 3',
        ]);
    }
}
