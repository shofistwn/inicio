@extends('layouts.dashboard')

@section('title', 'Data Artikel')
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Artikel</h1>
            <a class="btn btn-primary" href="{{ route('artikel.create') }}">Tambah Artikel</a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Artikel diupload</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover nowrap" id="dt" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Judul</th>
                                <th>Tanggal di Upload</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td align="center" style="vertical-align: middle;"></td>
                                <td align="center" style="vertical-align: middle;"></td>
                                <td align="center" style="vertical-align: middle;"></td>
                                <!-- <td>
                                                <a class="btn btn-danger btn-delete" href="#" role="button">Delete &nbsp;</a>
                                            </td> -->
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
