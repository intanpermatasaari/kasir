@extends('templates.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Pembelian</h1>
    </div>
    <div class="col-lg-10">
        <form action="/pembelian" method="post">
            @csrf
            @if (auth()->user()->access_level == 'admin')
                <div class="mb-3 row">
                    <label for="toko_id" class="col-sm-2 col-form-label">Suplier</label>
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
                <label for="no_faktur" class="col-sm-2 col-form-label">No. Faktur</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('no_faktur') is-invalid @enderror" id="no_faktur"
                        name="no_faktur" value="{{ old('no_faktur') }}">
                    @error('no_faktur')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tanggal_pembelian" class="col-sm-2 col-form-label">Tanggal Pembelian</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control @error('tanggal_pembelian') is-invalid @enderror"
                        id="tanggal_pembelian" name="tanggal_pembelian" value="{{ old('tanggal_pembelian') }}">
                    @error('tanggal_pembelian')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="suplier_id" class="col-sm-2 col-form-label">Suplier</label>
                <div class="col-sm-10">
                    <select class="form-select @error('suplier_id') is-invalid @enderror" id="suplier_id" name="suplier_id">
                        <option value="">-- Pilih Suplier --</option>
                        @foreach ($supliers as $suplier)
                            @if (old('suplier_id') == $suplier->id)
                                <option value="{{ $suplier->id }}" selected>{{ $suplier->nama_suplier }}</option>
                            @else
                                <option value="{{ $suplier->id }}">{{ $suplier->nama_suplier }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('suplier_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            {{-- <div class="mb-3 row">
                <label for="total" class="col-sm-2 col-form-label">Total</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control @error('total') is-invalid @enderror" id="total"
                        name="total" value="{{ old('total') }}">
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
                        name="bayar" value="{{ old('bayar') }}">
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
                        name="sisa" value="{{ old('sisa') }}">
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
                        name="keterangan">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary mt-3">Create</button>
                </div>
            </div>
        </form>
    </div>
@endsection
