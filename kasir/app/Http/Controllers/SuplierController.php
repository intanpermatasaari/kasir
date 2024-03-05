<?php

namespace App\Http\Controllers;

use App\Models\Pembelian_detail;
use App\Models\Pembelian;
use App\Models\Toko;
use App\Models\Suplier;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->access_level != 'admin') {
            return view('suplier.index', [
                'supliers' => Suplier::where('toko_id', auth()->user()->toko_id)->get()
            ]);
        }
        return view('suplier.index', [
            'supliers' => Suplier::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suplier.create', [
            'tokos' => Toko::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->access_level != 'admin') {
            $ValidatedData = $request->validate([
                'toko_id' => ['required'],
                'nama_suplier' => ['required'],
                'tlp_hp' => ['required'],
                'alamat_suplier' => ['required'],
            ]);

            Suplier::create($ValidatedData);

            return redirect('/suplier');
        }
        $ValidatedData = $request->validate([
            'nama_suplier' => ['required'],
            'tlp_hp' => ['required'],
            'alamat_suplier' => ['required'],
        ]);

        $ValidatedData['toko_id'] = auth()->user()->toko_id;

        Suplier::create($ValidatedData);

        return redirect('/suplier');
    }

    /**
     * Display the specified resource.
     */
    public function show(Suplier $suplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suplier $suplier)
    {
        return view('suplier.edit', [
            'tokos' => Toko::all(),
            'suplier' => $suplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Suplier $suplier)
    {
        if (auth()->user()->access_level != 'admin') {
            $ValidatedData = $request->validate([
                'toko_id' => ['required'],
                'nama_suplier' => ['required'],
                'tlp_hp' => ['required'],
                'alamat_suplier' => ['required'],
            ]);

            Suplier::where('id', $suplier->id)
                ->update($ValidatedData);

            return redirect('/suplier');
        }
        $ValidatedData = $request->validate([
            'nama_suplier' => ['required'],
            'tlp_hp' => ['required'],
            'alamat_suplier' => ['required'],
        ]);

        $ValidatedData['toko_id'] = auth()->user()->toko_id;

        Suplier::where('id', $suplier->id)
            ->update($ValidatedData);

        return redirect('/suplier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Suplier $suplier)
    {
        Suplier::destroy($suplier->id);

        $pembelians = Pembelian::where('suplier_id', $suplier->id)->get();
        foreach ($pembelians as $pembelian) {
            Pembelian_detail::where('pembelian_id', $pembelian->pembelian_id)->delete();
        }
        Pembelian::where('suplier_id', $suplier->id)->delete();

        return redirect('/suplier');
    }
}
