<?php

namespace App\Http\Controllers;

use App\Models\Penjualan_detail;
use App\Models\Penjualan;
use App\Models\Pelanggan;
use App\Models\Toko;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->access_level == 'admin') {
            return view('pelanggan.index', [
                'pelanggans' => Pelanggan::all()
            ]);
        }

        return view('pelanggan.index', [
            'pelanggans' => Pelanggan::where('toko_id', auth()->user()->toko_id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelanggan.create', [
            'tokos' => Toko::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->access_level == 'admin') {
            $ValidatedData = $request->validate([
                'toko_id' => ['required'],
                'nama_pelanggan' => ['required'],
                'alamat' => ['required'],
                'no_hp' => ['required'],
            ]);

            Pelanggan::create($ValidatedData);

            return redirect('/pelanggan');
        }
        $ValidatedData = $request->validate([
            'nama_pelanggan' => ['required'],
            'alamat' => ['required'],
            'no_hp' => ['required'],
        ]);

        $ValidatedData['toko_id'] = auth()->user()->toko_id;

        Pelanggan::create($ValidatedData);

        return redirect('/pelanggan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.edit', [
            'tokos' => Toko::all(),
            'pelanggan' => $pelanggan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        if (auth()->user()->access_level == 'admin') {
            $ValidatedData = $request->validate([
                'toko_id' => ['required'],
                'nama_pelanggan' => ['required'],
                'alamat' => ['required'],
                'no_hp' => ['required'],
            ]);

            Pelanggan::where('id', $pelanggan->id)
                ->update($ValidatedData);;

            return redirect('/pelanggan');
        }
        $ValidatedData = $request->validate([
            'nama_pelanggan' => ['required'],
            'alamat' => ['required'],
            'no_hp' => ['required'],
        ]);

        $ValidatedData['toko_id'] = auth()->user()->toko_id;

        Pelanggan::where('id', $pelanggan->id)
            ->update($ValidatedData);;

        return redirect('/pelanggan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        Pelanggan::destroy($pelanggan->id);

        $penjualans = Penjualan::where('pelanggan_id', $pelanggan->id)->get();
        foreach ($penjualans as $penjualan) {
            Penjualan_detail::where('penjualan_id', $penjualan->penjualan_id)->delete();
        }
        Penjualan::where('pelanggan_id', $pelanggan->id)->delete();

        return redirect('/pelanggan');
    }
}
