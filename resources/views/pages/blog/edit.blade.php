@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Buat Postingan') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('blog.update', $blog->id) }}" enctype="multipart/form-data">
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
                                        value="{{ old('foto', $blog->foto) }}">

                                    @error('foto')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="judul"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Judul') }}</label>

                                <div class="col-md-6">
                                    <input id="judul" type="text"
                                        class="form-control @error('judul') is-invalid @enderror" name="judul"
                                        value="{{ old('judul', $blog->judul) }}" required autocomplete="judul" autofocus>

                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="kategori"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Kategori') }}</label>

                                <div class="col-md-6">
                                    <input id="kategori" type="text"
                                        class="form-control @error('kategori') is-invalid @enderror" name="kategori"
                                        value="{{ old('kategori', $blog->kategori) }}" required autocomplete="kategori" autofocus>

                                    @error('kategori')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="konten"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Konten') }}</label>

                                <div class="col-md-6">
                                    <textarea name="konten" id="summernote"></textarea>

                                    @error('konten')
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
                                    var konten = {!! json_encode($blog->konten) !!};
                                    $('#summernote').summernote('code', konten);
                                });
                            </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
