@extends('templates.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Suplier</h1>
    </div>
    <div class="col-lg-10">
        <form action="/suplier/{{ $suplier->id }}" method="post">
            @method('put')
            @csrf
            @if (auth()->user()->access_level == 'admin')
                <div class="mb-3 row">
                    <label for="toko_id" class="col-sm-2 col-form-label">Toko</label>
                    <div class="col-sm-10">
                        <select class="form-select @error('toko_id') is-invalid @enderror" id="toko_id" name="toko_id">
                            <option value="">-- Pilih Toko --</option>
                            @foreach ($tokos as $toko)
                                @if (old('toko_id', $suplier->toko_id) == $toko->id)
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
                <label for="nama_suplier" class="col-sm-2 col-form-label">Nama Suplier</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nama_suplier') is-invalid @enderror" id="nama_suplier"
                        name="nama_suplier" value="{{ old('nama_suplier', $suplier->nama_suplier) }}">
                    @error('nama_suplier')
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
                        name="tlp_hp" value="{{ old('tlp_hp', $suplier->tlp_hp) }}">
                    @error('tlp_hp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat_suplier" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('alamat_suplier') is-invalid @enderror"
                        id="alamat_suplier" name="alamat_suplier"
                        value="{{ old('alamat_suplier', $suplier->alamat_suplier) }}">
                    @error('alamat_suplier')
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
