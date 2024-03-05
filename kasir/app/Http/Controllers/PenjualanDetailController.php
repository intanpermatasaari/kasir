<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Penjualan_detail;
use App\Models\Produk;
use Illuminate\Http\Request;

class PenjualanDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('penjualan_detail.index', [
        //     'penjualan_details' => Penjualan_detail::all()
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (auth()->user()->access_level == 'admin') {
            return view('penjualan_detail.create', [
                'produks' => Produk::all(),
                'id' => $request->input('id')
            ]);
        }
        return view('penjualan_detail.create', [
            'produks' => Produk::where('toko_id', auth()->user()->toko_id)->get(),
            'id' => $request->input('id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ValidatedData = $request->validate([
            'produk_id' => ['required'],
            'qty' => ['required'],
            'harga_beli' => ['required'],
            'harga_jual' => ['required'],
        ]);

        $ValidatedData['penjualan_id'] = $request->input('id');

        Penjualan_detail::create($ValidatedData);

        $penjualan = Penjualan::where('id', $request->input('id'))->first();

        Penjualan::where('id', $request->input('id'))->update([
            'total' => $penjualan->penjualan_detail->sum('qty'),
            'bayar' => $penjualan->penjualan_detail->sum('harga_jual'),
            'sisa' => $penjualan->penjualan_detail->sum('harga_jual') - $penjualan->penjualan_detail->sum('harga_beli'),
        ]);

        $produk = Produk::where('id', $request->input('produk_id'))->first();

        Produk::where('id', $request->input('produk_id'))->update([
            'stok' => $produk->pembelian_detail->sum('qty') - $produk->penjualan_detail->sum('qty'),
        ]);

        return redirect('/penjualan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penjualan_detail $penjualan_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Penjualan_detail $penjualan_detail)
    {
        if (auth()->user()->access_level == 'admin') {
            return view('penjualan_detail.edit', [
                'produks' => Produk::all(),
                'penjualan_detail' => $penjualan_detail
            ]);
        }
        return view('penjualan_detail.edit', [
            'produks' => Produk::where('toko_id', auth()->user()->toko_id)->get(),
            'penjualan_detail' => $penjualan_detail,
            'id' => $request->input('id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjualan_detail $penjualan_detail)
    {
        $ValidatedData = $request->validate([
            'produk_id' => ['required'],
            'qty' => ['required'],
            'harga_beli' => ['required'],
            'harga_jual' => ['required'],
        ]);

        Penjualan_detail::where('id', $penjualan_detail->id)
            ->update($ValidatedData);

        $penjualan = Penjualan::where('id', $penjualan_detail->penjualan_id)->first();

        Penjualan::where('id', $penjualan_detail->penjualan_id)->update([
            'total' => $penjualan->penjualan_detail->sum('qty'),
            'bayar' => $penjualan->penjualan_detail->sum('harga_jual'),
            'sisa' => $penjualan->penjualan_detail->sum('harga_jual') - $penjualan->penjualan_detail->sum('harga_beli'),
        ]);

        $produk = Produk::where('id', $request->input('produk_id'))->first();

        Produk::where('id', $request->input('produk_id'))->update([
            'stok' => $produk->pembelian_detail->sum('qty') - $produk->penjualan_detail->sum('qty'),
        ]);

        return redirect('/penjualan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan_detail $penjualan_detail)
    {
        Penjualan_detail::destroy($penjualan_detail->id);

        $penjualan = Penjualan::where('id', $penjualan_detail->penjualan_id)->first();

        Penjualan::where('id', $penjualan_detail->penjualan_id)->update([
            'total' => $penjualan->penjualan_detail->sum('qty'),
            'bayar' => $penjualan->penjualan_detail->sum('harga_jual'),
            'sisa' => $penjualan->penjualan_detail->sum('harga_jual') - $penjualan->penjualan_detail->sum('harga_beli'),
        ]);

        $produk = Produk::where('id', $penjualan_detail->produk_id)->first();

        Produk::where('id', $penjualan_detail->produk_id)->update([
            'stok' => $produk->pembelian_detail->sum('qty') - $produk->penjualan_detail->sum('qty'),
        ]);

        return redirect('/penjualan');
    }
}
