@extends('layouts.main')

@section('title', 'Tambah Obat')
@section('content')
    <div class="add">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="add-inner">
                        <h2>Edit Obat</h2>

                        <form method="POST" action="{{ route('obat.update', $obat->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Upload Foto Obat</label><br>
                                    <input type="file" accept="image/png,image/jpg,image/jpeg" name="foto">
                                </div>
                                <div class="col-md-6">
                                    <label>Nama Obat</label>
                                    <input class="form-control" type="text" placeholder="Nama Obat" name="nama" value="{{ old('nama', $obat->nama) }}">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label>Stok</label>
                                    <input class="form-control" type="number" placeholder="Stok" name="stok"
                                    value="{{ old('stok', $obat->stok) }}">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label>Harga</label>
                                    <input class="form-control" type="number" placeholder="Harga" name="harga"
                                    value="{{ old('harga', $obat->harga) }}">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label>Dosis</label>
                                    <input class="form-control" type="text" placeholder="Dosis" name="dosis"
                                    value="{{ old('dosis', $obat->dosis) }}">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label>Kategori</label>
                                    <select class="custom-select" name="kategori">
                                        <option>Kategori Obat</option>
                                        <option {{ $obat->kategori == 'Batuk dan Flu' ? 'selected' : '' }}>Batuk dan Flu</option>
                                        <option {{ $obat->kategori == 'Demam' ? 'selected' : '' }}>Demam</option>
                                        <option {{ $obat->kategori == 'Kulit' ? 'selected' : '' }}>Kulit</option>
                                        <option {{ $obat->kategori == 'Otot dan Tulang' ? 'selected' : '' }}>Otot dan Tulang</option>
                                        <option {{ $obat->kategori == 'Alergi' ? 'selected' : '' }}>Alergi</option>
                                        <option {{ $obat->kategori == 'Perawatan Kewanitaan' ? 'selected' : '' }}>Perawatan Kewanitaan</option>
                                        <option {{ $obat->kategori == 'Saluran pencernaan' ? 'selected' : '' }}>Saluran pencernaan</option>
                                        <option {{ $obat->kategori == 'Vitamin dan Suplemen' ? 'selected' : '' }}>Vitamin dan Suplemen</option>
                                        <option {{ $obat->kategori == 'Antibiotik' ? 'selected' : '' }}>Antibiotik</option>
                                        <option {{ $obat->kategori == 'Mulut dan Tenggorokan' ? 'selected' : '' }}>Mulut dan Tenggorokan</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label>Aturan Pakai</label>
                                    <input class="form-control" type="text" placeholder="Aturan Pakai" name="aturan_pakai"
                                    value="{{ old('aturan_pakai', $obat->aturan_pakai) }}">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label>Manufaktur</label>
                                    <input class="form-control" type="text" placeholder="Manufaktur" name="manufaktur"
                                    value="{{ old('manufaktur', $obat->manufaktur) }}">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label>Berat Obat</label>
                                    <input class="form-control" type="number" placeholder="Berat Obat" name="berat"
                                    value="{{ old('berat', $obat->berat) }}">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label>No Registrasi</label>
                                    <input class="form-control" type="number" placeholder="No Registrasi" name="no_registrasi"
                                    value="{{ old('no_registrasi', $obat->no_registrasi) }}">
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
            var deskripsi = {!! json_encode($obat->deskripsi) !!};
            $('#summernote').summernote('code', deskripsi);
        });
    </script>
@endsection
