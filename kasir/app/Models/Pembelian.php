<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function toko()
    {
        return $this->belongsTo(Toko::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function suplier()
    {
        return $this->belongsTo(Suplier::class);
    }
    public function pembelian_detail()
    {
        return $this->hasMany(Pembelian_detail::class);
    }
}
