@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Buat Postingan') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('obat.update', $obat->id) }}" enctype="multipart/form-data">
                            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                                integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
                            </script>
                            <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css"
                                rel="stylesheet">
                            <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="foto"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Foto') }}</label>

                                <div class="col-md-6">
                                    <input id="foto" type="file"
                                        class="form-control @error('foto') is-invalid @enderror" name="foto"
                                        value="{{ old('foto', $obat->foto) }}" autocomplete="foto" autofocus>

                                    @error('foto')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nama"
                                    class="col-md-4 col-form-label text-md-end">{{ __('nama') }}</label>

                                <div class="col-md-6">
                                    <input id="nama" type="text"
                                        class="form-control @error('nama') is-invalid @enderror" name="nama"
                                        value="{{ old('nama', $obat->nama) }}" required autocomplete="nama" autofocus>

                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="kategori"
                                    class="col-md-4 col-form-label text-md-end">{{ __('kategori') }}</label>

                                <div class="col-md-6">
                                    <input id="kategori" type="text"
                                        class="form-control @error('kategori') is-invalid @enderror" name="kategori"
                                        value="{{ old('kategori', $obat->kategori) }}" required autocomplete="kategori" autofocus>

                                    @error('kategori')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="stok"
                                    class="col-md-4 col-form-label text-md-end">{{ __('stok') }}</label>

                                <div class="col-md-6">
                                    <input id="stok" type="number"
                                        class="form-control @error('stok') is-invalid @enderror" name="stok"
                                        value="{{ old('stok', $obat->stok) }}" required autocomplete="stok" autofocus>

                                    @error('stok')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="harga"
                                    class="col-md-4 col-form-label text-md-end">{{ __('harga') }}</label>

                                <div class="col-md-6">
                                    <input id="harga" type="number"
                                        class="form-control @error('harga') is-invalid @enderror" name="harga"
                                        value="{{ old('harga', $obat->harga) }}" required autocomplete="harga" autofocus>

                                    @error('harga')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="deskripsi"
                                    class="col-md-4 col-form-label text-md-end">{{ __('deskripsi') }}</label>

                                <div class="col-md-6">
                                    <textarea name="deskripsi" id="summernote"></textarea>

                                    @error('deskripsi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="komposisi"
                                    class="col-md-4 col-form-label text-md-end">{{ __('komposisi') }}</label>

                                <div class="col-md-6">
                                    <input id="komposisi" type="text"
                                        class="form-control @error('komposisi') is-invalid @enderror" name="komposisi"
                                        value="{{ old('komposisi', $obat->komposisi) }}" required autocomplete="komposisi" autofocus>

                                    @error('komposisi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="dosis"
                                    class="col-md-4 col-form-label text-md-end">{{ __('dosis') }}</label>

                                <div class="col-md-6">
                                    <input id="dosis" type="text"
                                        class="form-control @error('dosis') is-invalid @enderror" name="dosis"
                                        value="{{ old('dosis', $obat->dosis) }}" required autocomplete="dosis" autofocus>

                                    @error('dosis')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="aturan_pakai"
                                    class="col-md-4 col-form-label text-md-end">{{ __('aturan_pakai') }}</label>

                                <div class="col-md-6">
                                    <input id="aturan_pakai" type="text"
                                        class="form-control @error('aturan_pakai') is-invalid @enderror" name="aturan_pakai"
                                        value="{{ old('aturan_pakai', $obat->aturan_pakai) }}" required autocomplete="aturan_pakai" autofocus>

                                    @error('aturan_pakai')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="manufaktur"
                                    class="col-md-4 col-form-label text-md-end">{{ __('manufaktur') }}</label>

                                <div class="col-md-6">
                                    <input id="manufaktur" type="text"
                                        class="form-control @error('manufaktur') is-invalid @enderror" name="manufaktur"
                                        value="{{ old('manufaktur', $obat->manufaktur) }}" required autocomplete="manufaktur" autofocus>

                                    @error('manufaktur')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="berat"
                                    class="col-md-4 col-form-label text-md-end">{{ __('berat') }}</label>

                                <div class="col-md-6">
                                    <input id="berat" type="text"
                                        class="form-control @error('berat') is-invalid @enderror" name="berat"
                                        value="{{ old('berat', $obat->berat) }}" required autocomplete="berat" autofocus>

                                    @error('berat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="no_registrasi"
                                    class="col-md-4 col-form-label text-md-end">{{ __('no_registrasi') }}</label>

                                <div class="col-md-6">
                                    <input id="no_registrasi" type="text"
                                        class="form-control @error('no_registrasi') is-invalid @enderror" name="no_registrasi"
                                        value="{{ old('no_registrasi', $obat->no_registrasi) }}" required autocomplete="no_registrasi" autofocus>

                                    @error('no_registrasi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Simpan') }}
                                    </button>
                                </div>
                            </div>

                            <script>
                                $(document).ready(function() {
                                    $('#summernote').summernote();
                                    var deskripsi = {!! json_encode($obat->deskripsi) !!};
                                    $('#summernote').summernote('code', deskripsi);
                                });
                            </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
