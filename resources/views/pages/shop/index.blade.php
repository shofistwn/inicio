@extends('layouts.main')

@section('title', 'Category')
@section('content')
    <style>
        .button1 {
            width: 40%;
            padding: 0px 5px 5px 0px;
            height: 40%;
            background-color: white;
            color: black;
            border: 2px solid #f1f1f1;
            transition: 0.3ms;
        }

        .button1:hover {
            background-color: #00b3ff;
        }

        .button2 {
            text-align: center;
            width: 40%;
            padding: 0px 5px 5px 0px;
            height: 40%;
            background-color: white;
            color: black;
            border: 2px solid #f1f1f1;
            transition: 0.3ms;
        }

        .button2:hover {
            background-color: #62ACCC;
        }
    </style>

    <div class="bottom-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="index.html">
                            <a class="navbar-brand" href="#">CatatanDoctor</a>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="search">
                        <form action="{{ route('shop.search') }}" method="GET">
                            <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="user">
                        <a href="{{ route('shop.cart') }}" class="btn cart">
                            <i class="fa fa-shopping-cart"></i>
                            <span>({{ \DB::table('carts')->where('user_id', auth()->user()->id)->count() }})</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="categori-judul">
        <div class="categori">
            <div class="card-header">
                <div class="category-title text-center">
                    <h1>Jelajahi Alat</h1>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">

                            @forelse ($products as $product)
                                <div class="col-sm-3">
                                    <div class="card">
                                        <img class="mb-3" src="{{ Storage::url('public/product/') . $product->foto }}">
                                        <div class="container">
                                            <h4 href="{{ route('produk.show', $product->id) }}">{{ $product->nama }}</h4>
                                            <div class="row">
                                                <a href="{{ route('produk.show', $product->slug) }}"
                                                    class="d-flex align-items-center justify-content-center button button1 mb-3 ml-3">Detail</a>
                                                <a class="d-flex align-items-center justify-content-center button button2 mb-3 ml-3"
                                                    href="{{ route('shop.checkout', $product->id) }}">Beli</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>

                    {{ $products->links() }}

                </div>
            </div>
        </div>
    </section>

@endsection
