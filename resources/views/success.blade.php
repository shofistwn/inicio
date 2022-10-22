@extends('layouts.main-without-navbar-footer')

@section('title', 'Pembayaran Berhasil')
@section('content')
    <div class="add">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card-header py-3">
                        <a href="{{ route('home') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i>&nbsp; Back</a>
                    </div>
                    <div class="add-inner">
                        <h2 class="text-center mb-4">Riwayat</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Nama Produk</h5>
                                <p>{{ $transaksi->nama }}</p>
                            </div>
                            <div class="col-md-6 mt-2">
                                <h5>Jumlah Pesanan</h5>
                                <p>{{ $transaksi->jumlah_pesanan }}</p>
                            </div>
                            <div class="col-md-6 mt-2">
                                <h5>Berat</h5>
                                <p>{{ $transaksi->berat }} Gram</p>
                            </div>
                            <div class="col-md-6 mt-2">
                                <h5>Harga</h5>
                                <P>Rp. {{ number_format($transaksi->harga, 2, ',', '.') }}</P>
                            </div>
                            <div class="col-md-6 mt-2">
                                <h5>Metode Pembayaran</h5>
                                <p>{{ $transaksi->jumlah_pesanan }}</p>
                            </div>
                            <div class="col-md-6 mt-2">
                                <h5>Ongkir</h5>
                                <P>Rp. {{ number_format($transaksi->ongkos_kirim, 2, ',', '.') }}</P>
                            </div>
                            <div class="col-md-6 mt-2">
                                <h5>Total Pembayaran</h5>
                                <P>Rp. {{ number_format($transaksi->total_pembayaran, 2, ',', '.') }}</P>
                            </div>
                            <div class="col-md-6 mt-2">
                                <h5>Rincian Alamat</h5>
                                <p>{{ $user->provinsi . ', ' . $user->kota . ', ' . $user->alamat_detail }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
