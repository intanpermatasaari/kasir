@extends('templates.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Penjualan</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="/penjualan/create" class="btn btn-sm btn-outline-primary">+ Tambah</a>
        </div>
    </div>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    @if (auth()->user()->access_level == 'admin')
                        <th scope="col">Toko</th>
                    @endif
                    @if (auth()->user()->access_level != 'kasir')
                        <th scope="col">User</th>
                    @endif
                    <th scope="col">Tanggal Penjualan</th>
                    <th scope="col">Pelanggan</th>
                    <th scope="col">Total</th>
                    <th scope="col">Bayar</th>
                    <th scope="col">Sisa</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penjualans as $penjualan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        @if (auth()->user()->access_level == 'admin')
                            <td>{{ $penjualan->toko->nama_toko }}</td>
                        @endif
                        @if (auth()->user()->access_level != 'kasir')
                            <td>{{ $penjualan->user->nama_lengkap }}</td>
                        @endif
                        <td>{{ $penjualan->tanggal_penjualan }}</td>
                        <td>{{ $penjualan->pelanggan->nama_pelanggan }}</td>
                        <td>{{ $penjualan->total }}</td>
                        <td>Rp{{ number_format($penjualan->bayar, 0, ',', '.') }}</td>
                        <td>Rp{{ number_format($penjualan->sisa, 0, ',', '.') }}</td>
                        <td>{{ $penjualan->keterangan }}</td>
                        <td class="d-flex justify-content-center">
                            <form action="/penjualan/{{ $penjualan->id }}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary border-0 me-2"><i
                                        class="bi bi-eye"></i></button>
                            </form>

                            <form action="/penjualan/{{ $penjualan->id }}/edit" method="get">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-secondary border-0 me-2"><i
                                        class="bi bi-pencil-square"></i></button>
                            </form>

                            <form action="/penjualan/{{ $penjualan->id }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger border-0"
                                    onclick="return confirm('Are you sure?')"><i class="bi bi-trash3"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
