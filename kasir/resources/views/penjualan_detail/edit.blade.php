@extends('templates.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Detail</h1>
    </div>
    <div class="col-lg-10">
        <form action="/penjualan_detail/{{ $penjualan_detail->id }}" method="post">
            @method('put')
            @csrf
            <div class="mb-3 row">
                <label for="produk_id" class="col-sm-2 col-form-label">Produk</label>
                <div class="col-sm-10">
                    <select class="form-select @error('produk_id') is-invalid @enderror" id="produk_id" name="produk_id"
                        oninput="val()">
                        <option value="">-- Pilih Produk --</option>
                        @foreach ($produks as $produk)
                            @if (old('produk_id', $penjualan_detail->produk_id) == $produk->id)
                                <option value="{{ $produk->id }}" data-harga-beli="{{ $produk->harga_beli }}"
                                    data-harga-jual="{{ $produk->harga_jual }}" selected>{{ $produk->nama_produk }}</option>
                            @else
                                <option value="{{ $produk->id }}" data-harga-beli="{{ $produk->harga_beli }}"
                                    data-harga-jual="{{ $produk->harga_jual }}">{{ $produk->nama_produk }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('produk_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="qty" class="col-sm-2 col-form-label">Qty</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control @error('qty') is-invalid @enderror" id="qty"
                        name="qty" value="{{ old('qty', $penjualan_detail->qty) }}" oninput="val()">
                    @error('qty')
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
                        name="harga_beli" value="{{ old('harga_beli', $penjualan_detail->harga_beli) }}" readonly>
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
                        name="harga_jual" value="{{ old('harga_jual', $penjualan_detail->harga_jual) }}" readonly>
                    @error('harga_jual')
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
    <script>
        function val() {
            const produk_id = document.getElementById('produk_id')
            const qty = document.getElementById('qty')
            const harga_beli = document.getElementById('harga_beli')
            const harga_jual = document.getElementById('harga_jual')
            harga_beli.value = produk_id.options[produk_id.selectedIndex].getAttribute('data-harga-beli') * qty.value
            harga_jual.value = produk_id.options[produk_id.selectedIndex].getAttribute('data-harga-jual') * qty.value
        }
    </script>
@endsection
