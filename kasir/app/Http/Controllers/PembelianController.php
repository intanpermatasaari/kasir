<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Pembelian_detail;
use App\Models\Toko;
use App\Models\Suplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->access_level == 'admin') {
            return view('pembelian.index', [
                'pembelians' => Pembelian::all()
            ]);
        }

        if (auth()->user()->access_level == 'manajer') {
            return view('pembelian.index', [
                'pembelians' => Pembelian::where('toko_id', auth()->user()->toko_id)->get()
            ]);
        }

        return view('pembelian.index', [
            'pembelians' => Pembelian::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->access_level == 'admin') {
            return view('pembelian.create', [
                'tokos' => Toko::all(),
                'supliers' => Suplier::all(),
            ]);
        }
        return view('pembelian.create', [
            'supliers' => Suplier::where('toko_id', auth()->user()->toko_id)->get(),
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
                'no_faktur' => ['required'],
                'tanggal_pembelian' => ['required'],
                'suplier_id' => ['required'],
                'keterangan' => ['required'],
            ]);

            $ValidatedData['user_id'] = auth()->user()->id;
            $ValidatedData['total'] = 0;
            $ValidatedData['bayar'] = 0;
            $ValidatedData['sisa'] = 0;

            Pembelian::create($ValidatedData);

            return redirect('/pembelian');
        }
        $ValidatedData = $request->validate([
            'no_faktur' => ['required'],
            'tanggal_pembelian' => ['required'],
            'suplier_id' => ['required'],
            'keterangan' => ['required'],
        ]);

        $ValidatedData['toko_id'] = auth()->user()->toko_id;
        $ValidatedData['user_id'] = auth()->user()->id;
        $ValidatedData['total'] = 0;
        $ValidatedData['bayar'] = 0;
        $ValidatedData['sisa'] = 0;

        Pembelian::create($ValidatedData);

        return redirect('/pembelian');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembelian $pembelian)
    {
        return view('pembelian_detail.index', [
            'pembelian' => $pembelian,
            'pembelian_details' => Pembelian_detail::where('pembelian_id', $pembelian->id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembelian $pembelian)
    {
        if (auth()->user()->access_level == 'admin') {
            return view('pembelian.edit', [
                'tokos' => Toko::all(),
                'supliers' => Suplier::all(),
                'pembelian' => $pembelian
            ]);
        }
        return view('pembelian.edit', [
            'supliers' => Suplier::where('toko_id', auth()->user()->toko_id)->get(),
            'pembelian' => $pembelian
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembelian $pembelian)
    {
        if (auth()->user()->access_level == 'admin') {
            $ValidatedData = $request->validate([
                'toko_id' => ['required'],
                'no_faktur' => ['required'],
                'tanggal_pembelian' => ['required'],
                'suplier_id' => ['required'],
                'keterangan' => ['required'],
            ]);

            $ValidatedData['total'] = 0;
            $ValidatedData['bayar'] = 0;
            $ValidatedData['sisa'] = 0;

            Pembelian::where('id', $pembelian->id)
                ->update($ValidatedData);

            return redirect('/pembelian');
        }
        $ValidatedData = $request->validate([
            'no_faktur' => ['required'],
            'tanggal_pembelian' => ['required'],
            'suplier_id' => ['required'],
            'keterangan' => ['required'],
        ]);

        $ValidatedData['total'] = 0;
        $ValidatedData['bayar'] = 0;
        $ValidatedData['sisa'] = 0;

        Pembelian::where('id', $pembelian->id)
            ->update($ValidatedData);

        return redirect('/pembelian');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembelian $pembelian)
    {
        Pembelian::destroy($pembelian->id);

        Pembelian_detail::where('pembelian_id', $pembelian->id)->delete();

        return redirect('/pembelian');
    }
}
