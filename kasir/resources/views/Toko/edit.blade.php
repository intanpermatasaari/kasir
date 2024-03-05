@extends('templates.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Toko</h1>
    </div>
    <div class="col-lg-10">
        <form action="/toko/{{ $toko->id }}" method="post">
            @method('put')
            @csrf
            <div class="mb-3 row">
                <label for="nama_toko" class="col-sm-2 col-form-label">Nama Toko</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nama_toko') is-invalid @enderror" id="nama_toko"
                        name="nama_toko" value="{{ old('nama_toko', $toko->nama_toko) }}">
                    @error('nama_toko')
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
                        name="alamat" value="{{ old('alamat', $toko->alamat) }}">
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tlp_hp" class="col-sm-2 col-form-label">Telepon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('tlp_hp') is-invalid @enderror" id="tlp_hp"
                        name="tlp_hp" value="{{ old('tlp_hp', $toko->tlp_hp) }}">
                    @error('tlp_hp')
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
