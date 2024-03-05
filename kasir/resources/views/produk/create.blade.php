@extends('templates.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Produk</h1>
    </div>
    <div class="col-lg-10">
        <form action="/produk" method="post">
            @csrf
            @if (auth()->user()->access_level == 'admin')
                <div class="mb-3 row">
                    <label for="toko_id" class="col-sm-2 col-form-label">Toko</label>
                    <div class="col-sm-10">
                        <select class="form-select @error('toko_id') is-invalid @enderror" id="toko_id" name="toko_id">
                            <option value="">-- Pilih Toko --</option>
                            @foreach ($tokos as $toko)
                                @if (old('toko_id') == $toko->id)
                                    <option value="{{ $toko->id }}" selected>{{ $toko->nama_toko }}</option>
                                @else
                                    <option value="{{ $toko->id }}">{{ $toko->nama_toko }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('toko_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            @endif
            <div class="mb-3 row">
                <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk"
                        name="nama_produk" value="{{ old('nama_produk') }}">
                    @error('nama_produk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="kategori_id" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                    <select class="form-select @error('kategori_id') is-invalid @enderror" id="kategori_id"
                        name="kategori_id">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($produk_kategoris as $produk_kategori)
                            @if (old('kategori_id') == $produk_kategori->id)
                                <option value="{{ $produk_kategori->id }}" selected>{{ $produk_kategori->nama_kategori }}
                                </option>
                            @else
                                <option value="{{ $produk_kategori->id }}">{{ $produk_kategori->nama_kategori }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    @if (auth()->user()->access_level == 'admin')
                        <div class="text-end">
                            <button type="button" data-bs-toggle="collapse" data-bs-target="#tambah_kategori"
                                aria-expanded="false" aria-controls="tambah_kategori" class="btn bg-transparent border-0">+
                                Tambah Kategori</button>
                        </div>
                        <div class="collapse mt-3" id="tambah_kategori">
                            <div class="mb-3 row">
                                <label for="nama_kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror"
                                        id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}">
                                    @error('nama_kategori')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="mb-3 row">
                <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok"
                        name="stok" value="{{ old('stok') }}">
                    @error('stok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('satuan') is-invalid @enderror" id="satuan"
                        name="satuan" value="{{ old('satuan') }}">
                    @error('satuan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="harga_beli" class="col-sm-2 col-form-label">Harga Beli</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control @error('harga_beli') is-invalid @enderror" id="harga_beli"
                        name="harga_beli" value="{{ old('harga_beli') }}">
                    @error('harga_beli')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="harga_jual" class="col-sm-2 col-form-label">Harga Jual</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual"
                        name="harga_jual">
                    @error('harga_jual')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary mt-3">Create</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
