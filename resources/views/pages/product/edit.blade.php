@extends('layouts.main')

@section('title', 'Edit Produk')
@section('content')
    <div class="add">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="add-inner">
                        <h2>Edit Produk</h2>

                        <form method="POST" action="{{ route('produk.update', $product->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="row pl-3 pr-3 align-items-center">
                                    <div class="col-md-6">
                                        <img class="mb-3 img-fluid"
                                            src="{{ Storage::url('public/product/') . $product->foto }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Upload Foto Produk</label><br>
                                        <input type="file" accept="image/png,image/jpg,image/jpeg" name="foto">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label>Nama Produk</label>
                                    <input class="form-control" type="text" placeholder="Nama Produk" name="nama"
                                        value="{{ old('nama', $product->nama) }}">
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label>Stok</label>
                                    <input class="form-control" type="number" placeholder="Stok" name="stok"
                                        value="{{ old('stok', $product->stok) }}">
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label>Harga</label>
                                    <input class="form-control" type="number" placeholder="Harga" name="harga"
                                        value="{{ old('harga', $product->harga) }}">
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label>Kategori</label>
                                    <select class="custom-select" name="kategori">
                                        <option>Kategori Produk</option>
                                        <option
                                            {{ old('kategori', $product->kategori) == 'Batuk dan Flu' ? 'selected' : '' }}>
                                            Batuk dan Flu</option>
                                        <option {{ old('kategori', $product->kategori) == 'Demam' ? 'selected' : '' }}>Demam
                                        </option>
                                        <option {{ old('kategori', $product->kategori) == 'Kulit' ? 'selected' : '' }}>Kulit
                                        </option>
                                        <option
                                            {{ old('kategori', $product->kategori) == 'Otot dan Tulang' ? 'selected' : '' }}>
                                            Otot dan Tulang</option>
                                        <option {{ old('kategori', $product->kategori) == 'Alergi' ? 'selected' : '' }}>
                                            Alergi</option>
                                        <option
                                            {{ old('kategori', $product->kategori) == 'Perawatan Kewanitaan' ? 'selected' : '' }}>
                                            Perawatan Kewanitaan</option>
                                        <option
                                            {{ old('kategori', $product->kategori) == 'Saluran pencernaan' ? 'selected' : '' }}>
                                            Saluran pencernaan</option>
                                        <option
                                            {{ old('kategori', $product->kategori) == 'Vitamin dan Suplemen' ? 'selected' : '' }}>
                                            Vitamin dan Suplemen</option>
                                        <option
                                            {{ old('kategori', $product->kategori) == 'Antibiotik' ? 'selected' : '' }}>
                                            Antibiotik</option>
                                        <option
                                            {{ old('kategori', $product->kategori) == 'Mulut dan Tenggorokan' ? 'selected' : '' }}>
                                            Mulut dan Tenggorokan</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label>Berat Produk</label>
                                    <input class="form-control" type="number" placeholder="Berat Produk" name="berat"
                                        value="{{ old('berat', $product->berat) }}">
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="textarea">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" id="summernote"></textarea>
                                </div>
                                <div class="col-md-2 mt-4 mx-auto">
                                    <button type="submit" class="btn btn-outline-success">submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
            var deskripsi = {!! json_encode($product->deskripsi) !!};
            $('#summernote').summernote('code', deskripsi);
        });
    </script>
@endsection
