@extends('templates.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Produk</h1>
        @if (auth()->user()->access_level != 'kasir')
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="/produk/create" class="btn btn-sm btn-outline-primary">+ Tambah</a>
            </div>
        @endif
    </div>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    @if (auth()->user()->access_level == 'admin')
                        <th scope="col">Toko</th>
                    @endif
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Harga Beli</th>
                    <th scope="col">Harga Jual</th>
                    @if (auth()->user()->access_level == 'admin')
                        <th scope="col" class="text-center">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($produks as $produk)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        @if (auth()->user()->access_level == 'admin')
                            <td>{{ $produk->toko->nama_toko }}</td>
                        @endif
                        <td>{{ $produk->nama_produk }}</td>
                        <td>{{ $produk->kategori->nama_kategori }}</td>
                        <td>{{ $produk->stok }}</td>
                        <td>{{ $produk->satuan }}</td>
                        <td>Rp{{ number_format($produk->harga_beli, 0, ',', '.') }}</td>
                        <td>Rp{{ number_format($produk->harga_jual, 0, ',', '.') }}</td>
                        @if (auth()->user()->access_level != 'kasir')
                            <td class="d-flex justify-content-center">
                                {{-- <form action="/produk/{{ $produk->id }}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary border-0 me-2"><i class="bi bi-eye"></i></button>
                            </form> --}}

                                <form action="/produk/{{ $produk->id }}/edit" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-secondary border-0 me-2"><i
                                            class="bi bi-pencil-square"></i></button>
                                </form>
                                <form action="/produk/{{ $produk->id }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger border-0"
                                        onclick="return confirm('Are you sure?')"><i class="bi bi-trash3"></i></button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
