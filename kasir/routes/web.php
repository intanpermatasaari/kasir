<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PembelianDetailController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PenjualanDetailController;
use App\Http\Controllers\ProdukKategoriController;
use App\Http\Controllers\StokBarangController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\UserController;
use App\Models\Pembelian;
use App\Models\Penjualan;
use App\Models\Penjualan_detail;
use App\Models\Produk;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (auth()->user()->access_level == 'admin') {
        return view('index', [
            'pembelians' => Pembelian::orderBy('id', 'desc')->paginate(10),
            'penjualans' => Penjualan::orderBy('id', 'desc')->paginate(10)
        ]);
    }
    if (auth()->user()->access_level == 'manajer') {
        return view('index', [
            'pembelians' => Pembelian::where('toko_id', auth()->user()->toko_id)->orderBy('id', 'desc')->paginate(10),
            'penjualans' => Penjualan::where('toko_id', auth()->user()->toko_id)->orderBy('id', 'desc')->paginate(10)
        ]);
    }
    if (auth()->user()->access_level == 'kasir') {
        return view('index', [
            'pembelians' => Pembelian::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(10),
            'penjualans' => Penjualan::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(10)
        ]);
    }
})->middleware('auth');

Route::get('/sign-in', [UserController::class, 'index'])->name('login')->middleware('guest');
Route::post('/sign-in', [UserController::class, 'authenticate'])->middleware('guest');
Route::get('/sign-out', [UserController::class, 'logout'])->middleware('auth');

// admin
Route::resource('/user', DataUserController::class)->middleware('admin');
Route::resource('/produk_kategori', ProdukKategoriController::class)->middleware('admin');
Route::resource('/toko', TokoController::class)->middleware('admin');

//manajer
Route::resource('/produk', ProdukController::class)->middleware('auth');
Route::resource('/suplier', SuplierController::class)->middleware('manajer');

// user
Route::resource('/pembelian', PembelianController::class)->middleware('auth');
Route::resource('/pembelian_detail', PembelianDetailController::class)->middleware('auth');
Route::resource('/penjualan', PenjualanController::class)->middleware('auth');
Route::resource('/penjualan_detail', PenjualanDetailController::class)->middleware('auth');
Route::resource('/pelanggan', PelangganController::class)->middleware('auth');
