<?php

namespace App\Http\Controllers;

use App\Models\Pembelian_detail;
use App\Models\Penjualan_detail;
use App\Models\Pembelian;
use App\Models\Penjualan;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;

class DataUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index', [
            'users' => User::whereNot('access_level', 'admin')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create', [
            'tokos' => Toko::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ValidatedData = $request->validate([
            'toko_id' => ['required'],
            'nama_lengkap' => ['required'],
            'username' => ['required', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required'],
            'alamat' => ['required'],
            'access_level' => ['required'],
        ]);

        $ValidatedData['password'] = bcrypt($request->input('password'));

        User::create($ValidatedData);

        return redirect('/user');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit', [
            'tokos' => Toko::all(),
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'toko_id' => ['required'],
            'nama_lengkap' => ['required'],
            'alamat' => ['required'],
            'access_level' => ['required'],
        ];


        if ($request->username != $user->username) {
            $rules['username'] = ['required', 'unique:users'];
        } else {
            $rules['username'] = ['required'];
        }

        if ($request->email != $user->email) {
            $rules['email'] = ['required', 'email', 'unique:users'];
        } else {
            $rules['email'] = ['required', 'email'];
        }

        $ValidatedData = $request->validate($rules);

        if ($request->input('password')) {
            $ValidatedData['password'] = bcrypt($request->input('password'));
        }

        User::where('id', $user->id)
            ->update($ValidatedData);

        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        $pembelians = Pembelian::where('user_id', $user->id)->get();
        foreach ($pembelians as $pembelian) {
            Pembelian_detail::where('pembelian_id', $pembelian->pembelian_id)->delete();
        }
        Pembelian::where('user_id', $user->id)->delete();

        $penjualans = Penjualan::where('user_id', $user->id)->get();
        foreach ($penjualans as $penjualan) {
            Penjualan_detail::where('penjualan_id', $penjualan->penjualan_id)->delete();
        }
        Penjualan::where('user_id', $user->id)->delete();

        return redirect('/user');
    }
}
