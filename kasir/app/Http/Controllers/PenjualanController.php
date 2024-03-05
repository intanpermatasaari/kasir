<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\Pelanggan;
use App\Models\Penjualan_detail;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->access_level == 'admin') {
            return view('penjualan.index', [
                'penjualans' => Penjualan::all()
            ]);
        }

        if (auth()->user()->access_level == 'manajer') {
            return view('penjualan.index', [
                'penjualans' => Penjualan::where('toko_id', auth()->user()->toko_id)->get()
            ]);
        }

        return view('penjualan.index', [
            'penjualans' => Penjualan::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->access_level == 'admin') {
            return view('penjualan.create', [
                'tokos' => Toko::all(),
                'pelanggans' => Pelanggan::all(),
            ]);
        }
        return view('penjualan.create', [
            'pelanggans' => Pelanggan::where('toko_id', auth()->user()->toko_id)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->access_level == 'admin') {
            if ($request->input('nama_pelanggan')) {
                $ValidatedData = $request->validate([
                    'nama_pelanggan' => ['required'],
                    'alamat' => ['required'],
                    'no_hp' => ['required'],
                ]);

                $ValidatedData['toko_id'] = auth()->user()->toko_id;

                Pelanggan::create($ValidatedData);

                $ValidatedData = $request->validate([
                    'toko_id' => ['required'],
                    'tanggal_penjualan' => ['required'],
                    'keterangan' => ['required'],
                ]);

                $ValidatedData['user_id'] = auth()->user()->id;
                $ValidatedData['pelanggan_id'] = Pelanggan::where('nama_pelanggan', $request->input('nama_pelanggan'))->first()->id;
                $ValidatedData['total'] = 0;
                $ValidatedData['bayar'] = 0;
                $ValidatedData['sisa'] = 0;

                Penjualan::create($ValidatedData);

                return redirect('/penjualan');
            } else {
                $ValidatedData = $request->validate([
                    'toko_id' => ['required'],
                    'tanggal_penjualan' => ['required'],
                    'pelanggan_id' => ['required'],
                    'keterangan' => ['required'],
                ]);

                $ValidatedData['user_id'] = auth()->user()->id;
                $ValidatedData['total'] = 0;
                $ValidatedData['bayar'] = 0;
                $ValidatedData['sisa'] = 0;

                Penjualan::create($ValidatedData);

                return redirect('/penjualan');
            }
        }
        if ($request->input('nama_pelanggan')) {
            $ValidatedData = $request->validate([
                'nama_pelanggan' => ['required'],
                'alamat' => ['required'],
                'no_hp' => ['required'],
            ]);

            $ValidatedData['toko_id'] = auth()->user()->toko_id;

            Pelanggan::create($ValidatedData);

            $ValidatedData = $request->validate([
                'tanggal_penjualan' => ['required'],
                'keterangan' => ['required'],
            ]);

            $ValidatedData['toko_id'] = auth()->user()->toko_id;
            $ValidatedData['user_id'] = auth()->user()->id;
            $ValidatedData['pelanggan_id'] = Pelanggan::where('nama_pelanggan', $request->input('nama_pelanggan'))->first()->id;
            $ValidatedData['total'] = 0;
            $ValidatedData['bayar'] = 0;
            $ValidatedData['sisa'] = 0;

            Penjualan::create($ValidatedData);

            return redirect('/penjualan');
        } else {
            $ValidatedData = $request->validate([
                'tanggal_penjualan' => ['required'],
                'pelanggan_id' => ['required'],
                'keterangan' => ['required'],
            ]);

            $ValidatedData['user_id'] = auth()->user()->id;
            $ValidatedData['toko_id'] = auth()->user()->toko_id;
            $ValidatedData['total'] = 0;
            $ValidatedData['bayar'] = 0;
            $ValidatedData['sisa'] = 0;

            Penjualan::create($ValidatedData);

            return redirect('/penjualan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {
        return view('penjualan_detail.index', [
            'penjualan' => $penjualan,
            'penjualan_details' => Penjualan_detail::where('penjualan_id', $penjualan->id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan)
    {
        if (auth()->user()->access_level == 'admin') {
            return view('penjualan.edit', [
                'tokos' => Toko::all(),
                'pelanggans' => Pelanggan::all(),
                'penjualan' => $penjualan
            ]);
        }
        return view('penjualan.edit', [
            'pelanggans' => Pelanggan::where('toko_id', auth()->user()->toko_id)->get(),
            'penjualan' => $penjualan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        if (auth()->user()->access_level == 'admin') {
            if ($request->input('nama_pelanggan')) {
                $ValidatedData = $request->validate([
                    'nama_pelanggan' => ['required'],
                    'alamat' => ['required'],
                    'no_hp' => ['required'],
                ]);

                Pelanggan::create($ValidatedData);

                $ValidatedData = $request->validate([
                    'toko_id' => ['required'],
                    'tanggal_penjualan' => ['required'],
                    'keterangan' => ['required'],
                ]);

                $ValidatedData['pelanggan_id'] = Pelanggan::where('nama_pelanggan', $request->input('nama_pelanggan'))->first()->id;
                $ValidatedData['total'] = 0;
                $ValidatedData['bayar'] = 0;
                $ValidatedData['sisa'] = 0;

                Penjualan::where('id', $penjualan->id)
                    ->update($ValidatedData);

                return redirect('/penjualan');
            } else {
                $ValidatedData = $request->validate([
                    'toko_id' => ['required'],
                    'tanggal_penjualan' => ['required'],
                    'pelanggan_id' => ['required'],
                    'keterangan' => ['required'],
                ]);

                $ValidatedData['total'] = 0;
                $ValidatedData['bayar'] = 0;
                $ValidatedData['sisa'] = 0;

                Penjualan::where('id', $penjualan->id)
                    ->update($ValidatedData);

                return redirect('/penjualan');
            }
        }
        if ($request->input('nama_pelanggan')) {
            $ValidatedData = $request->validate([
                'nama_pelanggan' => ['required'],
                'alamat' => ['required'],
                'no_hp' => ['required'],
            ]);

            Pelanggan::create($ValidatedData);

            $ValidatedData = $request->validate([
                'tanggal_penjualan' => ['required'],
                'keterangan' => ['required'],
            ]);

            $ValidatedData['pelanggan_id'] = Pelanggan::where('nama_pelanggan', $request->input('nama_pelanggan'))->first()->id;
            $ValidatedData['total'] = 0;
            $ValidatedData['bayar'] = 0;
            $ValidatedData['sisa'] = 0;

            Penjualan::where('id', $penjualan->id)
                ->update($ValidatedData);

            return redirect('/penjualan');
        } else {
            $ValidatedData = $request->validate([
                'tanggal_penjualan' => ['required'],
                'pelanggan_id' => ['required'],
                'keterangan' => ['required'],
            ]);

            $ValidatedData['total'] = 0;
            $ValidatedData['bayar'] = 0;
            $ValidatedData['sisa'] = 0;

            Penjualan::where('id', $penjualan->id)
                ->update($ValidatedData);

            return redirect('/penjualan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan $penjualan)
    {
        Penjualan::destroy($penjualan->id);

        Penjualan_detail::where('penjualan_id', $penjualan->id)->delete();

        return redirect('/penjualan');
    }
}
