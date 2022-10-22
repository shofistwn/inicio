@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Pegawai</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pegawai }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Produk Terjual</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $produkTerjual }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Jumlah Produk</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $produk }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah
                                    Artikel</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $artikel }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Penjualan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover nowrap" id="dt" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Jumlah Pesanan</th>
                                <th>Berat / Gram</th>
                                <th>Ongkir</th>
                                <th>Total Pembayaran</th>
                                <th>Status Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($dataTransaksi as $transaksi)
                                <tr>
                                    <td align="center" style="vertical-align: middle;">{{ $transaksi['product']['nama'] }}
                                    </td>
                                    <td align="center" style="vertical-align: middle;">{{ $transaksi->jumlah_pesanan }}</td>
                                    <td align="center" style="vertical-align: middle;">{{ $transaksi['product']['berat'] }}
                                    </td>
                                    <td align="center" style="vertical-align: middle;">
                                        {{ number_format($transaksi->ongkos_kirim, 2, ',', '.') }}</td>
                                    <td align="center" style="vertical-align: middle;">
                                        {{ number_format($transaksi->total_pembayaran, 2, ',', '.') }}</td>
                                    <td align="center" style="vertical-align: middle;">
                                        @if ($transaksi->status_pembayaran == 1)
                                            <span class="badge badge-warning">Menunggu</span>
                                        @elseif ($transaksi->status_pembayaran == 2)
                                            <span class="badge badge-success">Selesai</span>
                                        @elseif ($transaksi->status_pembayaran == 3)
                                            <span class="badge badge-secondary">Kadaluarsa</span>
                                        @elseif ($transaksi->status_pembayaran == 4)
                                            <span class="badge badge-danger">Batal</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
