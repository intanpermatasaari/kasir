@extends('templates.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Toko</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="/toko/create" class="btn btn-sm btn-outline-primary">+ Tambah</a>
        </div>
    </div>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Toko</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Telepon</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tokos as $toko)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $toko->nama_toko }}</td>
                        <td>{{ $toko->alamat }}</td>
                        <td>{{ $toko->tlp_hp }}</td>
                        <td class="d-flex justify-content-center">
                            {{-- <form action="/toko/{{ $toko->id }}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary border-0 me-2"><i class="bi bi-eye"></i></button>
                            </form> --}}

                            <form action="/toko/{{ $toko->id }}/edit" method="get">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-secondary border-0 me-2"><i
                                        class="bi bi-pencil-square"></i></button>
                            </form>

                            <form action="/toko/{{ $toko->id }}" method="post">
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
