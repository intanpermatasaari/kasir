<?php

namespace App\Models;

use App\Models\Produk_kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kategori()
    {
        return $this->belongsTo(Produk_kategori::class);
    }
    public function toko()
    {
        return $this->belongsTo(Toko::class);
    }
    public function pembelian_detail()
    {
        return $this->hasMany(pembelian_detail::class);
    }
    public function penjualan_detail()
    {
        return $this->hasMany(penjualan_detail::class);
    }
}
