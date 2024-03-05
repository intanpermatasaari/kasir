<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Produk_kategori;
use Illuminate\Http\Request;

class ProdukKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('produk_kategori.index', [
            'produk_kategoris' => Produk_kategori::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk_kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ValidatedData = $request->validate([
            'nama_kategori' => ['required'],
        ]);

        Produk_kategori::create($ValidatedData);

        return redirect('/produk_kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk_kategori $produk_kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk_kategori $produk_kategori)
    {
        return view('produk_kategori.edit', [
            'produk_kategori' => $produk_kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk_kategori $produk_kategori)
    {
        $ValidatedData = $request->validate([
            'nama_kategori' => ['required'],
        ]);

        Produk_kategori::where('id', $produk_kategori->id)
            ->update($ValidatedData);

        return redirect('/produk_kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk_kategori $produk_kategori)
    {
        Produk_kategori::destroy($produk_kategori->id);

        Produk::where('kategori_id', $produk_kategori->id)->delete();

        return redirect('/produk_kategori');
    }
}
