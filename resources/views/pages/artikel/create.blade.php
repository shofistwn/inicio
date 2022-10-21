@extends('layouts.main')

@section('title', 'Tambah Artikel')
@section('container')
    <div class="add-artikel">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="container-fluid">
                        <div class="row mt-3 justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <button class="btn btn-primary"><i class="fas fa-arrow-left"></i>&nbsp; Back</button>
                                    </div>
                                    <div class="card-body">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label class="control-label form-label">Upload foto</label>
                                                    <div class="preview-zone hidden">
                                                        <div class="box box-solid">
                                                            <div class="box-body mt-3"></div>
                                                        </div>
                                                    </div>
                                                    <div class="dropzone-wrapper mb-2">
                                                        <div class="dropzone-desc">
                                                            <img width="280px" class="d-none spinner-loading"
                                                                src="" alt="">
                                                            <i class="fas fa-download download-icon"></i>
                                                            <p class="dropzone-desc-text">Choose an image file or drag it
                                                                here.</p>
                                                        </div>
                                                        <input type="file" name="photo" class="dropzone">
                                                    </div>
                                                    <div class="row justify-content-between">
                                                        <div class="col-lg-5">
                                                            <a href="#" class="text-danger remove-preview"><i
                                                                    class="fa fa-times"></i>&nbsp; Reset the field</a>
                                                        </div>

                                                        <div class="col-lg-5">
                                                            <small class="text-danger error-upload"></small>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mt-2">
                                                            <label>Judul</label>
                                                            <input class="form-control" type="text"
                                                                placeholder="judul artikel">
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <label>Kategori</label>
                                                            <select class="custom-select">
                                                                <option selected>kategori artikel</option>
                                                                <option>Penyakit</option>
                                                                <option>Kesehatan Lansia</option>
                                                                <option>Hidup Sehat</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="caption" class="form-label">Caption</label>
                                                    <textarea class="form-control" name="caption" id="caption" rows="3"
                                                        style="resize: none; height: 150px; padding: 15px;" placeholder="sertakan deskripsi.."></textarea>
                                                </div>
                                                <button type="submit" id="btn-upload" class="btn btn-primary">Post
                                                    Artikel</button>
                                                <button class="btn btn-primary d-none" id="btn-upload-loading"
                                                    type="button">
                                                    <span class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span>
                                                    Loading...
                                                </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
