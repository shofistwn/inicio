<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap"
        rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    {{-- <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    <link href="{{ asset('assets/lib/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/slick/slick-theme.css') }}" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">

    <title>Checkout</title>
</head>

<body>


    <!-- Checkout Start -->
    <div class="checkout">
        <div class="container-fluid">

            <form action="{{ route('payment') }}" method="post">
                @csrf

                <div class="row">
                    <div class="col-lg-8">
                        <div class="checkout-inner">
                            <div class="billing-address">
                                <h2>Checkout</h2>
                                <div class="row">
                                    <input id="form-ongkir" type="text" name="ongkos_kirim" hidden>
                                    <input id="form-total" type="number" name="total_pembayaran" hidden>

                                    <div class="col-md-12 mt-3">
                                        <label>Nama Penerima</label>
                                        <input class="form-control" type="text" placeholder="Nama Lengkap"
                                            value="{{ old('nama_penerima', $user->nama) }}" name="nama_penerima">
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label>Telepon</label>
                                        <input class="form-control" type="text" placeholder="Telepon"
                                            value="{{ old('telepon', $user->telepon) }}" name="telepon">
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label class="mt-2">Provinsi</label>
                                        <select class="form-control provinsi-asal" name="provinsi">
                                            <option value="0">Pilih Provinsi</option>
                                            @foreach ($provinces as $province => $value)
                                                <option value="{{ $province }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label class="mt-2">Kota / Kabupaten</label>
                                        <select class="form-control kota-tujuan" name="kota">
                                            <option value="">Pilih Kota / Kabupaten</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label>Alamat Detail</label>
                                        <textarea class="form-control" placeholder="Alamat" name="alamat_detail"></textarea>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label>Kode Pos</label>
                                        <input class="form-control" type="number" placeholder="Kode Pos"
                                            name="kode_pos">
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label class="mt-2">Jasa Ekspedisi</label>
                                        <select class="form-control kurir" name="jasa_ekspedisi">
                                            <option value="0">Pilih Jasa Ekspedisi</option>
                                            <option value="jne">JNE</option>
                                            <option value="pos">POS</option>
                                            <option value="tiki">TIKI</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout-inner">
                            <div class="checkout-summary">
                                <h1>Total</h1>
                                <p>Nama Produk<span>---</span></p>
                                <p class="sub-total">Jumlah Pesanan<span>
                                        <select class="" name="jumlah_pesanan">
                                            <option value="0" selected>0</option>
                                            @for ($i = 1; $i <= 10; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </span>
                                </p>
                                <p class="sub-total">Sub Total<span id="subtotal">---</span></p>
                                <p class="ship-cost">Ongkir<span id="ongkir">---</span></p>
                                <h2>Total Bayar<span id="total">---</span></h2>
                            </div>

                            <div class="checkout-payment">
                                {{-- <div class="payment-methods">
                                    <h1>Metode Pembayaran</h1>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-1"
                                                name="payment">
                                            <label class="custom-control-label" for="payment-1">Paypal</label>
                                        </div>
                                        <div class="payment-content" id="payment-1-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt
                                                orci ac eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-2"
                                                name="payment">
                                            <label class="custom-control-label" for="payment-2">Payoneer</label>
                                        </div>
                                        <div class="payment-content" id="payment-2-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt
                                                orci ac eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-3"
                                                name="payment">
                                            <label class="custom-control-label" for="payment-3">Check Payment</label>
                                        </div>
                                        <div class="payment-content" id="payment-3-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt
                                                orci ac eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-4"
                                                name="payment">
                                            <label class="custom-control-label" for="payment-4">Direct Bank
                                                Transfer</label>
                                        </div>
                                        <div class="payment-content" id="payment-4-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt
                                                orci ac eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-5"
                                                name="payment">
                                            <label class="custom-control-label" for="payment-5">Cash on
                                                Delivery</label>
                                        </div>
                                        <div class="payment-content" id="payment-5-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt
                                                orci ac eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="checkout-btn">
                                    <button type="submit">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!-- Checkout End -->

    <!-- Footer Start -->
    <div class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Contact Us</h2>
                        <div class="contact-info">
                            <p><i class="fa fa-map-marker"></i>Trenggalek</p>
                            <p><i class="fa fa-envelope"></i>email@example.com</p>
                            <p><i class="fa fa-phone"></i>+123-456-7890</p>
                            <img src="img/payment-method.png" alt="#">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Follow Us</h2>
                        <div class="contact-info">
                            <div class="social">
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Category</h2>
                        <ul>
                            <li><a href="#">Batuk dan Flu</a></li>
                            <li><a href="#">Kulit</a></li>
                            <li><a href="#">Otot Tulang dan Sendi</a></li>
                            <li><a href="#">Alergi</a></li>
                            <li><a href="#">Vitamin dan Suplemen</a></li>
                            <li><a href="#">Antibiotik</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Help</h2>
                        <ul>
                            <li><a href="#">Payment Policy</a></li>
                            <li><a href="#">Shipping Policy</a></li>
                            <li><a href="#">Return Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Footer Bottom Start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 copyright">
                    <p>Copyright &copy; <a href="#">INICIO</a>. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->

    <!-- Optional JavaScript -->
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/slick/slick.min.js') }}"></script>

    <!-- Template Javascript -->
    {{-- <script src="js/main.js"></script> --}}
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script> --}}


    <script>
        const rupiah = (number) => {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(number);
        }
        var $subtotal = 10000;
        document.getElementById("form-total").value = 1;
        document.getElementById("form-ongkir").value = 0;
        document.getElementById("subtotal").innerHTML = rupiah($subtotal, 'Rp. ');
        $(document).ready(function() {
            $('select[name="jumlah_pesanan"]').on('change', function() {
                let jumlah = $(this).val();

                $subtotal = jumlah * 10000;

                document.getElementById("subtotal").innerHTML = rupiah($subtotal, 'Rp. ');
                if (Number(document.getElementById("form-ongkir").value) > 0) {
                    $total = Number(document.getElementById("form-ongkir").value) + Number($subtotal);
                    document.getElementById("form-total").value = $total;
                    document.getElementById("total").innerHTML = rupiah($total, 'Rp. ');
                }
            });
            //ajax select kota asal
            $('select[name="provinsi"]').on('change', function() {
                let provindeId = $(this).val();
                if (provindeId) {
                    jQuery.ajax({
                        url: '/cities/' + provindeId,
                        type: "GET",
                        dataType: "json",
                        success: function(response) {
                            $('select[name="kota"]').empty();
                            $('select[name="kota"]').append(
                                '<option value="">Pilih Kota / Kabupaten</option>');
                            $.each(response, function(key, value) {
                                $('select[name="kota"]').append(
                                    '<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        },
                    });
                } else {
                    $('select[name="kota"]').append(
                        '<option value="">Pilih Kota / Kabupaten</option>');
                }
            });

            let isProcessing = false;
            $('select[name="jasa_ekspedisi"]').on('change', function() {

                let token = $("meta[name='csrf-token']").attr("content");
                let city_origin = 1;
                let kota = $('select[name=kota]').val();
                let jasa_ekspedisi = $(this).val();
                let weight = 1000;

                if (isProcessing) {
                    return;
                }

                isProcessing = true;
                jQuery.ajax({
                    url: "/ongkir",
                    data: {
                        _token: token,
                        city_origin: city_origin,
                        city_destination: kota,
                        courier: jasa_ekspedisi,
                        weight: weight,
                    },
                    dataType: "JSON",
                    type: "POST",
                    success: function(data) {
                        isProcessing = false;
                        if (data) {
                            document.getElementById("form-ongkir").value = data[0]['costs']['0']
                                ['cost'][0]['value'];
                            document.getElementById("ongkir").innerHTML = rupiah(data[0][
                                'costs'
                            ]['0']['cost'][0]['value'], 'Rp. ');

                            $total = data[0]['costs']['0']
                                ['cost'][0]['value'] + Number($subtotal);
                            document.getElementById("form-total").value = $total;
                            document.getElementById("total").innerHTML = rupiah($total, 'Rp. ');
                        } else {
                            confirm('Jasa ekspedisi tidak tersedia!');
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>
