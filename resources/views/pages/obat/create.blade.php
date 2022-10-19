@extends('layouts.main')

@section('title', 'Tambah Obat')
@section('content')
    <div class="add">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="add-inner">
                        <h2>Tambah Obat</h2>

                        <form method="POST" action="{{ route('obat.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Upload Foto Obat</label><br>
                                    <input type="file" accept="image/png,image/jpg,image/jpeg" name="foto">
                                </div>
                                <div class="col-md-6">
                                    <label>Nama Obat</label>
                                    <input class="form-control" type="text" placeholder="Nama Obat" name="nama" value="{{ old('nama') }}">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label>Stok</label>
                                    <input class="form-control" type="number" placeholder="Stok" name="stok"
                                    value="{{ old('stok') }}">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label>Harga</label>
                                    <input class="form-control" type="number" placeholder="Harga" name="harga"
                                    value="{{ old('harga') }}">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label>Dosis</label>
                                    <input class="form-control" type="text" placeholder="Dosis" name="dosis"
                                    value="{{ old('dosis') }}">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label>Kategori</label>
                                    <select class="custom-select" name="kategori">
                                        <option selected>Kategori Obat</option>
                                        <option>Batuk dan Flu</option>
                                        <option>Demam</option>
                                        <option>Kulit</option>
                                        <option>Otot dan Tulang</option>
                                        <option>Alergi</option>
                                        <option>Perawatan Kewanitaan</option>
                                        <option>Saluran pencernaan</option>
                                        <option>Vitamin dan Suplemen</option>
                                        <option>Antibiotik</option>
                                        <option>Mulut dan Tenggorokan</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label>Aturan Pakai</label>
                                    <input class="form-control" type="text" placeholder="Aturan Pakai" name="aturan_pakai"
                                    value="{{ old('aturan_pakai') }}">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label>Manufaktur</label>
                                    <input class="form-control" type="text" placeholder="Manufaktur" name="manufaktur"
                                    value="{{ old('manufaktur') }}">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label>Berat Obat</label>
                                    <input class="form-control" type="number" placeholder="Berat Obat" name="berat"
                                    value="{{ old('berat') }}">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label>No Registrasi</label>
                                    <input class="form-control" type="number" placeholder="No Registrasi" name="no_registrasi"
                                    value="{{ old('no_registrasi') }}">
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
