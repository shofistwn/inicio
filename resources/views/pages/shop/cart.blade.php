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
                <div class="col">
                    <div class="cart-page-inner">

                        <form action="{{ route('shop.store') }}" method="post">
                            @csrf
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
                                        <input type="text" name="ids[]" value="{{ $product->id }}" hidden>
                                            <tr>
                                                <td>
                                                    <div class="img">
                                                        <a href="#"><img src="" alt="Image"></a>
                                                        <p>{{ $product['product']['nama'] }}</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="qty">
                                                        <select class="form-control" name="quantities[]">
                                                            <option value="1" selected>1</option>
                                                            @for ($i = 2; $i <= 10; $i++)
                                                                <option value="{{ $i }}">{{ $i }}
                                                                </option>
                                                            @endfor
                                                        </select>
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

                            <div class="col-4 mx-auto">
                                <div class="cart">
                                    <div class="cart-btn">
                                        <a href="{{ route('shop.index') }}">
                                            <button>Batal</button>
                                        </a>
                                        <button type="submit">Checkout</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
