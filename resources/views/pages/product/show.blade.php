@extends('layouts.main-navbar-sm')

@section('title', 'Detail Produk')
@section('content')

    <div class="product-detail">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="product-detail-top">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <div class="img-detail">
                                    <div class="slider-nav-img"><img src="img/obat/tremenza.webp" alt=""
                                            width="70%" height="60%"></div>
                                </div>
                            </div>
                            <div class="col-md-7">

                                <form action="{{ route('shop.storeCart') }}" method="post">
                                    @csrf

                                    <input type="text" name="product_id" value="{{ $product->id }}" hidden>
                                    <div class="product-content">
                                        <div class="title">
                                            <h2>{{ $product->nama }}</h2>
                                        </div>
                                        <div class="price">
                                            <h4>Harga</h4>
                                            <p>Rp. {{ $product->harga }}</p>
                                        </div>
                                        <div class="quantity">
                                            <h4>Jumlah</h4>
                                            <div class="qty">
                                                <select class="form-control" name="quantity">
                                                    <option value="1" selected>1</option>
                                                    @for ($i = 2; $i <= 10; $i++)
                                                        <option value="{{ $i }}">{{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="cart-btn">
                                            <button class="btn text-white" style="background: #62ACCC;" type="submit">Masukkan Keranjang</button>
                                            <a class="btn text-white" style="background: #62ACCC;"
                                                href="{{ route('shop.checkout', $product->id) }}">Beli</a>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="row product-detail-bottom">
                        <div class="col-lg-12">
                            <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Deskripsi</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="description" class="container tab-pane active">
                                    <h4>Deskripsi</h4>
                                    {!! $product->deskripsi !!}
                                    <hr>
                                    <h4>Stok</h4>
                                    {{ $product->stok }}
                                    <hr>
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
