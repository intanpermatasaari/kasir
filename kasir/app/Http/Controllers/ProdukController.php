<?php

namespace App\Http\Controllers;

use App\Models\Penjualan_detail;
use App\Models\Pembelian_detail;
use App\Models\Produk_kategori;
use App\Models\Toko;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->access_level != 'admin') {
            return view('produk.index', [
                'produks' => Produk::where('toko_id', auth()->user()->toko_id)->get()
            ]);
        }
        return view('produk.index', [
            'produks' => Produk::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create', [
            'produk_kategoris' => Produk_kategori::all(),
            'tokos' => Toko::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->access_level == 'admin') {
            if ($request->input('nama_kategori')) {
                $ValidatedData = $request->validate([
                    'nama_kategori' => ['required'],
                ]);

                Produk_kategori::create($ValidatedData);

                $ValidatedData = $request->validate([
                    'toko_id' => ['required'],
                    'nama_produk' => ['required'],
                    'stok' => ['required'],
                    'satuan' => ['required'],
                    'harga_beli' => ['required'],
                    'harga_jual' => ['required'],
                ]);

                $ValidatedData['kategori_id'] = Produk_kategori::where('nama_kategori', $request->input('nama_kategori'))->first()->id;

                Produk::create($ValidatedData);

                return redirect('/produk');
            } else {
                $ValidatedData = $request->validate([
                    'toko_id' => ['required'],
                    'nama_produk' => ['required'],
                    'kategori_id' => ['required'],
                    'stok' => ['required'],
                    'satuan' => ['required'],
                    'harga_beli' => ['required'],
                    'harga_jual' => ['required'],
                ]);

                Produk::create($ValidatedData);

                return redirect('/produk');
            }
        }
        $ValidatedData = $request->validate([
            'nama_produk' => ['required'],
            'kategori_id' => ['required'],
            'stok' => ['required'],
            'satuan' => ['required'],
            'harga_beli' => ['required'],
            'harga_jual' => ['required'],
        ]);

        $ValidatedData['toko_id'] = auth()->user()->toko_id;

        Produk::create($ValidatedData);

        return redirect('/produk');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        return view('produk.edit', [
            'produk_kategoris' => Produk_kategori::all(),
            'tokos' => Toko::all(),
            'produk' => $produk,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        if (auth()->user()->access_level == 'admin') {
            if ($request->input('nama_kategori')) {
                $ValidatedData = $request->validate([
                    'nama_kategori' => ['required'],
                ]);

                Produk_kategori::create($ValidatedData);

                $ValidatedData = $request->validate([
                    'toko_id' => ['required'],
                    'nama_produk' => ['required'],
                    'stok' => ['required'],
                    'satuan' => ['required'],
                    'harga_beli' => ['required'],
                    'harga_jual' => ['required'],
                ]);

                $ValidatedData['kategori_id'] = Produk_kategori::where('nama_kategori', $request->input('nama_kategori'))->first()->id;

                Produk::where('id', $produk->id)
                    ->update($ValidatedData);

                return redirect('/produk');
            } else {
                $ValidatedData = $request->validate([
                    'toko_id' => ['required'],
                    'nama_produk' => ['required'],
                    'kategori_id' => ['required'],
                    'stok' => ['required'],
                    'satuan' => ['required'],
                    'harga_beli' => ['required'],
                    'harga_jual' => ['required'],
                ]);

                Produk::where('id', $produk->id)
                    ->update($ValidatedData);

                return redirect('/produk');
            }
        }
        $ValidatedData = $request->validate([
            'nama_produk' => ['required'],
            'kategori_id' => ['required'],
            'stok' => ['required'],
            'satuan' => ['required'],
            'harga_beli' => ['required'],
            'harga_jual' => ['required'],
        ]);

        $ValidatedData['toko_id'] = auth()->user()->toko_id;

        Produk::where('id', $produk->id)
            ->update($ValidatedData);

        return redirect('/produk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        Produk::destroy($produk->id);

        Pembelian_detail::where('produk_id', $produk->id)->delete();

        Penjualan_detail::where('produk_id', $produk->id)->delete();

        return redirect('/produk');
    }
}
