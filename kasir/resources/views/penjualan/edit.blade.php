@extends('templates.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Penjualan</h1>
    </div>
    <div class="col-lg-10">
        <form action="/penjualan/{{ $penjualan->id }}" method="post">
            @method('put')
            @csrf
            @if (auth()->user()->access_level == 'admin')
                <div class="mb-3 row">
                    <label for="toko_id" class="col-sm-2 col-form-label">Toko</label>
                    <div class="col-sm-10">
                        <select class="form-select @error('toko_id') is-invalid @enderror" id="toko_id" name="toko_id">
                            <option value="">-- Pilih Toko --</option>
                            @foreach ($tokos as $toko)
                                @if (old('toko_id', $penjualan->toko_id) == $toko->id)
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
                <label for="tanggal_penjualan" class="col-sm-2 col-form-label">Tanggal penjualan</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control @error('tanggal_penjualan') is-invalid @enderror"
                        id="tanggal_penjualan" name="tanggal_penjualan"
                        value="{{ old('tanggal_penjualan', $penjualan->tanggal_penjualan) }}">
                    @error('tanggal_penjualan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="pelanggan_id" class="col-sm-2 col-form-label">Pelanggan</label>
                <div class="col-sm-10">
                    <select class="form-select @error('pelanggan_id') is-invalid @enderror" id="pelanggan_id"
                        name="pelanggan_id">
                        <option value="">-- Pilih Pelanggan --</option>
                        @foreach ($pelanggans as $pelanggan)
                            @if (old('pelanggan_id', $penjualan->pelanggan_id) == $pelanggan->id)
                                <option value="{{ $pelanggan->id }}" selected>{{ $pelanggan->nama_pelanggan }}</option>
                            @else
                                <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama_pelanggan }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('pelanggan_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="text-end">
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#tambah_pelanggan"
                            aria-expanded="false" aria-controls="tambah_pelanggan" class="btn bg-transparent border-0">+
                            Tambah Pelanggan</button>
                    </div>
                    <div class="collapse mt-3" id="tambah_pelanggan">
                        <div class="mb-3 row">
                            <label for="nama_pelanggan" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('nama_pelanggan') is-invalid @enderror"
                                    id="nama_pelanggan" name="nama_pelanggan" value="{{ old('nama_pelanggan') }}">
                                @error('nama_pelanggan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                    id="alamat" name="alamat" value="{{ old('alamat') }}">
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="no_hp" class="col-sm-2 col-form-label">Telepon</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                    id="no_hp" name="no_hp" value="{{ old('no_hp') }}">
                                @error('no_hp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="mb-3 row">
                <label for="total" class="col-sm-2 col-form-label">Total</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control @error('total') is-invalid @enderror" id="total"
                        name="total" value="{{ old('total', $penjualan->total) }}">
                    @error('total')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="bayar" class="col-sm-2 col-form-label">Bayar</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control @error('bayar') is-invalid @enderror" id="bayar"
                        name="bayar" value="{{ old('bayar', $penjualan->bayar) }}">
                    @error('bayar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="sisa" class="col-sm-2 col-form-label">Sisa</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control @error('sisa') is-invalid @enderror" id="sisa"
                        name="sisa" value="{{ old('sisa', $penjualan->sisa) }}">
                    @error('sisa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div> --}}
            <div class="mb-3 row">
                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                        name="keterangan">{{ old('keterangan', $penjualan->keterangan) }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
