@extends('templates.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Pembelian</h1>
        <form action="/pembelian_detail/create" method="get" class="btn-toolbar mb-2 mb-md-0">
            @csrf
            <input type="hidden" name="id" value="{{ $pembelian->id }}">
            <button type="submit" class="btn btn-sm btn-outline-primary">+ Tambah</button>
        </form>
    </div>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Harga Beli</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembelian_details as $pembelian_detail)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pembelian_detail->produk->nama_produk }}</td>
                        <td>{{ $pembelian_detail->qty }}</td>
                        <td>Rp{{ number_format($pembelian_detail->harga_beli, 0, ',', '.') }}</td>
                        <td class="d-flex justify-content-center">
                            {{-- <form action="/pembelian_detail/{{ $pembelian_detail->id }}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary border-0 me-2"><i class="bi bi-eye"></i></button>
                            </form> --}}

                            <form action="/pembelian_detail/{{ $pembelian_detail->id }}/edit" method="get">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-secondary border-0 me-2"><i
                                        class="bi bi-pencil-square"></i></button>
                            </form>

                            <form action="/pembelian_detail/{{ $pembelian_detail->id }}" method="post">
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
