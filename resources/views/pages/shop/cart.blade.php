@extends('layouts.main')

@section('title', 'Keranjang')
@section('content')
    <div class="bottom-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="index.html">
                            <a class="navbar-brand" href="#">CatatanDOCTOR</a>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="search">
                        <input type="text" placeholder="Search">
                        <button><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="cart-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-page-inner">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Product</th>
                                        <th>Jumlah</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    @forelse ($products as $product)
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="" alt="Image"></a>
                                                    <p>{{ $product['product']['nama'] }}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="qty">
                                                    <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="{{ $product->quantity }}">
                                                    <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <button>
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">Kosong!</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart-page-inner">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="cart">
                                    <div class="cart-content">
                                        <h1>Pembayaran</h1>
                                        <h2>Total<span>Rp---</span></h2>
                                    </div>
                                    <div class="cart-btn">
                                        <a href="{{ route('shop.index') }}">
                                            <button>Batal</button>
                                        </a>
                                        <a href="{{ route('shop.checkout') }}"><button>Checkout</button></a>
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
