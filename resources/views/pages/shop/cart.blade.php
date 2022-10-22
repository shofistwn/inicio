@extends('layouts.main-navbar-sm')

@section('title', 'Keranjang')
@section('content')

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
                                            {{-- <th>Hapus</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        @forelse ($products as $product)
                                            <input type="text" name="ids[]" value="{{ $product->id }}" hidden>
                                            <tr>
                                                <td>
                                                    <a href="{{ route('produk.show', $product['product']['slug']) }}">
                                                        <div class="img">
                                                            <img class="mb-3 img-fluid"
                                                                src="//project.smkn2trenggalek.sch.id:6500/public/product/{{ $product['product']['foto'] }}">
                                                            <p class="text-dark">{{ $product['product']['nama'] }}</p>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="qty">
                                                        <select class="form-control" name="quantities[]">
                                                            @for ($i = 1; $i <= 10; $i++)
                                                                <option
                                                                    {{ old('quantity', $product->quantity) == $i ? 'selected' : '' }}
                                                                    value="{{ $i }}">{{ $i }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </td>
                                                {{-- <td>
                                                    <button type="submit">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td> --}}
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3">Kosong!</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex justify-content-center mt-3">
                                <button class="btn btn-lg text-white" style="background: #62ACCC;"
                                    type="submit">Checkout</button>
                            </div>
                        </form>

                        <div class="d-flex justify-content-center mt-3">
                            <a href="{{ route('shop.index') }}">
                                <button class="btn btn-secondary btn-lg mr-3">Batal</button>
                            </a>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('cart.destroy') }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-lg text-center m-0">Hapus Semua</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
