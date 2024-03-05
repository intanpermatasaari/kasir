<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use App\Models\Pembelian_detail;
use App\Models\Pembelian;
use App\Models\Penjualan_detail;
use App\Models\Penjualan;
use App\Models\Pelanggan;
use App\Models\Produk;
use App\Models\User;
use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('toko.index', [
            'tokos' => Toko::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('toko.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ValidatedData = $request->validate([
            'nama_toko' => ['required'],
            'alamat' => ['required'],
            'tlp_hp' => ['required'],
        ]);

        Toko::create($ValidatedData);

        return redirect('/toko');
    }

    /**
     * Display the specified resource.
     */
    public function show(Toko $toko)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Toko $toko)
    {
        return view('toko.edit', [
            'toko' => $toko
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Toko $toko)
    {
        $ValidatedData = $request->validate([
            'nama_toko' => ['required'],
            'alamat' => ['required'],
            'tlp_hp' => ['required'],
        ]);

        Toko::where('id', $toko->id)
            ->update($ValidatedData);

        return redirect('/toko');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Toko $toko)
    {
        Toko::destroy($toko->id);

        User::where('toko_id', $toko->id)->delete();
        Produk::where('toko_id', $toko->id)->delete();
        Suplier::where('toko_id', $toko->id)->delete();
        Pelanggan::where('toko_id', $toko->id)->delete();

        $pembelians = Pembelian::where('toko_id', $toko->id)->get();
        foreach ($pembelians as $pembelian) {
            Pembelian_detail::where('pembelian_id', $pembelian->pembelian_id)->delete();
        }
        Pembelian::where('toko_id', $toko->id)->delete();

        $penjualans = Penjualan::where('toko_id', $toko->id)->get();
        foreach ($penjualans as $penjualan) {
            Penjualan_detail::where('penjualan_id', $penjualan->penjualan_id)->delete();
        }
        Penjualan::where('toko_id', $toko->id)->delete();



        return redirect('/toko');
    }
}
