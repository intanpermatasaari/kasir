<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Pembelian_detail;
use App\Models\Produk;
use Illuminate\Http\Request;

class PembelianDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('pembelian_detail.index', [
        //     'pembelian_details' => Pembelian_detail::all()
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (auth()->user()->access_level == 'admin') {
            return view('pembelian_detail.create', [
                'produks' => Produk::all(),
                'id' => $request->input('id')
            ]);
        }
        return view('pembelian_detail.create', [
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
        ]);

        $ValidatedData['pembelian_id'] = $request->input('id');

        Pembelian_detail::create($ValidatedData);

        $pembelian = Pembelian::where('id', $request->input('id'))->first();

        Pembelian::where('id', $request->input('id'))->update([
            'total' => $pembelian->pembelian_detail->sum('qty'),
            'bayar' => $pembelian->pembelian_detail->sum('harga_beli'),
            'sisa' => 0,
        ]);

        $produk = Produk::where('id', $request->input('produk_id'))->first();

        Produk::where('id', $request->input('produk_id'))->update([
            'stok' => $produk->pembelian_detail->sum('qty') - $produk->penjualan_detail->sum('qty'),
        ]);

        return redirect('/pembelian');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembelian_detail $pembelian_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Pembelian_detail $pembelian_detail)
    {
        if (auth()->user()->access_level == 'admin') {
            return view('pembelian_detail.edit', [
                'produks' => Produk::all(),
                'pembelian_detail' => $pembelian_detail
            ]);
        }
        return view('pembelian_detail.edit', [
            'produks' => Produk::where('toko_id', auth()->user()->toko_id)->get(),
            'pembelian_detail' => $pembelian_detail,
            'id' => $request->input('id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembelian_detail $pembelian_detail)
    {
        $ValidatedData = $request->validate([
            'produk_id' => ['required'],
            'qty' => ['required'],
            'harga_beli' => ['required'],
        ]);

        Pembelian_detail::where('id', $pembelian_detail->id)
            ->update($ValidatedData);

        $pembelian = Pembelian::where('id', $pembelian_detail->pembelian_id)->first();

        Pembelian::where('id', $pembelian_detail->pembelian_id)->update([
            'total' => $pembelian->pembelian_detail->sum('qty'),
            'bayar' => $pembelian->pembelian_detail->sum('harga_beli'),
            'sisa' => 0,
        ]);

        $produk = Produk::where('id', $request->input('produk_id'))->first();

        Produk::where('id', $request->input('produk_id'))->update([
            'stok' => $produk->pembelian_detail->sum('qty') - $produk->penjualan_detail->sum('qty'),
        ]);

        return redirect('/pembelian');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembelian_detail $pembelian_detail)
    {
        Pembelian_detail::destroy($pembelian_detail->id);

        $pembelian = Pembelian::where('id', $pembelian_detail->pembelian_id)->first();

        Pembelian::where('id', $pembelian_detail->pembelian_id)->update([
            'total' => $pembelian->pembelian_detail->sum('qty'),
            'bayar' => $pembelian->pembelian_detail->sum('harga_beli'),
            'sisa' => 0,
        ]);

        $produk = Produk::where('id', $pembelian_detail->produk_id)->first();

        Produk::where('id', $pembelian_detail->produk_id)->update([
            'stok' => $produk->pembelian_detail->sum('qty') - $produk->penjualan_detail->sum('qty'),
        ]);

        return redirect('/pembelian');
    }
}
