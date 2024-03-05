@extends('templates.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah User</h1>
    </div>
    <div class="col-lg-10">
        <form action="/user" method="post">
            @csrf
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
            <div class="mb-3 row">
                <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap"
                        name="nama_lengkap" value="{{ old('nama_lengkap') }}">
                    @error('nama_lengkap')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                        name="username" value="{{ old('username') }}">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password">
                    @error('password')
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
                <label for="access_level" class="col-sm-2 col-form-label">Level Akses</label>
                <div class="col-sm-10">
                    <select class="form-select @error('access_level') is-invalid @enderror" id="access_level"
                        name="access_level">
                        <option value="">-- Pilih Level Akses --</option>
                        <option value="manajer">Manajer</option>
                        <option value="kasir">Kasir</option>
                    </select>
                    @error('access_level')
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
