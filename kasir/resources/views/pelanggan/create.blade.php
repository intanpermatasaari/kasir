@extends('templates.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Pelanggan</h1>
    </div>
    <div class="col-lg-10">
        <form action="/pelanggan" method="post">
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
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                        name="alamat" value="{{ old('alamat') }}">
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
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                        name="no_hp" value="{{ old('no_hp') }}">
                    @error('no_hp')
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
