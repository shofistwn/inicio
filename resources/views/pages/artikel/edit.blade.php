@extends('layouts.main-without-navbar-footer')

@section('title', 'Tambah Artikel')
@section('content')

    <div class="add">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="add-inner">
                        <h2>Tambah Artikel</h2>

                        <form method="POST" action="{{ route('artikel.update', $artikel->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="row pl-3 pr-3 align-items-center">
                                    <div class="col-md-6">
                                        <img class="mb-3 img-fluid"
                                            src="//project.smkn2trenggalek.sch.id:6500/public/artikel/{{ $artikel->foto }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Thumbnail Artikel</label><br>
                                        <input type="file" accept="image/png,image/jpg,image/jpeg" name="foto">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label>Judul Artikel</label>
                                    <input class="form-control" type="text" placeholder="Judul Artikel" name="judul"
                                        value="{{ old('judul', $artikel->judul) }}">
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label>Kategori</label>
                                    <select class="custom-select" name="kategori">
                                        <option>Kategori Artikel:</option>
                                        <option {{ old('kategori', $artikel->kategori) == 'Penyakit' ? 'selected' : '' }}>Penyakit</option>
                                        <option {{ old('kategori', $artikel->kategori) == 'Kesehatan Lansia' ? 'selected' : '' }}>Kesehatan
                                            Lansia</option>
                                        <option {{ old('kategori', $artikel->kategori) == 'Hidup Sehat' ? 'selected' : '' }}>Hidup Sehat
                                        </option>
                                    </select>
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
            var deskripsi = {!! json_encode($artikel->deskripsi) !!};
            $('#summernote').summernote('code', deskripsi);
        });
    </script>
@endsection
