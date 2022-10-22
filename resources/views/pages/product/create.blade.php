@extends('layouts.main-navbar-sm')

@section('title', 'Tambah Produk')
@section('content')
    <div class="add">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="add-inner">
                        <h2>Tambah Produk</h2>

                        <form method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-12">
                                    <label>Upload Foto Produk</label><br>
                                    <input type="file" accept="image/png,image/jpg,image/jpeg" name="foto">
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label>Nama Produk</label>
                                    <input class="form-control" type="text" placeholder="Nama Produk" name="nama" value="{{ old('nama') }}">
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label>Stok</label>
                                    <input class="form-control" type="number" placeholder="Stok" name="stok"
                                    value="{{ old('stok') }}">
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label>Harga</label>
                                    <input class="form-control" type="number" placeholder="Harga" name="harga"
                                    value="{{ old('harga') }}">
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label>Kategori</label>
                                    <select class="custom-select" name="kategori">
                                        <option>Kategori Produk:</option>
                                        <option {{ old('kategori') == 'Alat Kedokteran' ? 'selected' : '' }}>Alat Kedokteran</option>
                                        <option {{ old('kategori') == 'Alat Bantu Dengar' ? 'selected' : '' }}>Alat Bantu Dengar</option>
                                        <option {{ old('kategori') == 'Alat Bantu Jalan' ? 'selected' : '' }}>Alat Bantu Jalan</option>
                                        <option {{ old('kategori') == 'Rapid Test' ? 'selected' : '' }}>Rapid Test</option>
                                        <option {{ old('kategori') == 'Alat P3K' ? 'selected' : '' }}>Alat P3K</option>
                                        <option {{ old('kategori') == 'Model Kerangka Manusia' ? 'selected' : '' }}>Model Kerangka Manusia</option>
                                        <option {{ old('kategori') == 'Kursi Roda' ? 'selected' : '' }}>Kursi Roda</option>
                                        <option {{ old('kategori') == 'Termometer' ? 'selected' : '' }}>Termometer</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label>Berat Produk</label>
                                    <input class="form-control" type="number" placeholder="Berat Produk" name="berat"
                                    value="{{ old('berat') }}">
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
            $('#summernote').summernote({
                height: 450,
            });
        });
    </script>
@endsection
