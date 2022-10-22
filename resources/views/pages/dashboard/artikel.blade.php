@extends('layouts.admin')

@section('title', 'Data Artikel')
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Artikel</h1>
            <a class="btn btn-primary" href="{{ route('artikel.create') }}">Tambah Artikel</a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Artikel</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover nowrap" id="dt" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($dataArtikel as $artikel)
                                <tr>
                                    <td align="center" style="vertical-align: middle;">
                                        <img style="max-width: 200px" class="mb-3 img-fluid"
                                            src="//project.smkn2trenggalek.sch.id:6500/public/artikel/{{ $artikel->foto }}">
                                    </td>
                                    <td align="center" style="vertical-align: middle;">{{ $artikel->judul }}</td>
                                    <td align="center" style="vertical-align: middle;">{{ $artikel->kategori }}</td>
                                    <td align="center" style="vertical-align: middle;">{{ $artikel->created_at }}</td>
                                    <td align="center" style="vertical-align: middle;">
                                        <a class="btn btn-primary mb-2" href="{{ route('artikel.edit', $artikel->id) }}">Edit</a>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('dashboard.hapusArtikel', $artikel->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger text-center m-0">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Tidak ada data!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
