@extends('layouts.admin')

@section('title', 'Data Pegawai')
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Pegawai</h1>
        </div>


        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Identitas Pegawai</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover nowrap" id="dt" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Pegawai</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pegawai['users'] as $key => $value)
                                <tr>
                                    <td align="center" style="vertical-align: middle;">{{ $value['nama'] }}</td>
                                    <td align="center" style="vertical-align: middle;">{{ $value['email'] }}</td>
                                    <td align="center" style="vertical-align: middle;">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('dashboard.hapusPegawai', $value['id']) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger text-center m-0">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="3">Tidak ada data!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
