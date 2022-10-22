@extends('layouts.pegawai')

@section('title', 'Data Produk')
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Produk</h1>
            <a class="btn btn-primary" href="{{ route('produk.create') }}">Tambah Produk</a>
        </div>


        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Produk</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover nowrap" id="dt" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Berat</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($dataProduk as $produk)
                                <tr>
                                    <td align="center" style="vertical-align: middle;">
                                        <img style="max-width: 200px" class="mb-3 img-fluid"
                                            src="//project.smkn2trenggalek.sch.id:6500/public/product/{{ $produk->foto }}">
                                    </td>
                                    <td align="center" style="vertical-align: middle;">{{ $produk->nama }}</td>
                                    <td align="center" style="vertical-align: middle;">
                                        {{ number_format($produk->harga, 2, ',', '.') }}</td>
                                    <td align="center" style="vertical-align: middle;">{{ $produk->stok }}</td>
                                    <td align="center" style="vertical-align: middle;">{{ $produk->berat }}</td>
                                    <td align="center" style="vertical-align: middle;">{{ $produk->kategori }}</td>
                                    <td align="center" style="vertical-align: middle;">
                                        <a class="btn btn-primary mb-2"
                                            href="{{ route('produk.edit', $produk->id) }}">Edit</a>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('dashboard.hapusProduk', $produk->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger text-center m-0">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>Tidak ada data!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
