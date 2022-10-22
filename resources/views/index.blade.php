@extends('layouts.main')

@section('title', 'Home')
@section('content')
    <div class="container">
        <!-- info panel -->
        <div class="row justify-content-center">
            <div class="col-10 info-panel">
                <div class="row">
                    <div class="col-sm">
                        <img src="{{ asset('assets/img/blog.webp') }}" alt="Employee" class="img-fluid float-left">
                        <a class="navbar-brand1" href="#artikel" style="text-decoration: none;">Artikel</a>
                        <p>Tentang artikel</p>
                    </div>
                    <div class="col-lg">
                        <img src="{{ asset('assets/img/toko2.webp') }}" alt="HiRes" class="img-fluid float-left">
                        <a class="navbar-brand1" href="{{ route('shop.index') }}" style="text-decoration: none;">Toko
                            Kesehatan</a>
                        <p>Cek alat kesehatan</p>
                    </div>
                    <div class="col-lg">
                        <img src="{{ asset('assets/img/event.webp') }}" alt="Security" class="img-fluid float-left">
                        <a class="navbar-brand1" href="#kategori" style="text-decoration: none;">Kategori</a>
                        <p>lihat kategori</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row workingspace">
            <div class="col-lg-6">
                <img src="{{ asset('assets/img/image/invest3.webp') }}" alt="Working Space" class="img-fluid">
            </div>
            <div class="col-lg-5">
                <h2><span>INVEST</span> In Your <span>HEALTH</span></h2>
                <p>Waktu dan Kesehatan adalah dua aset berharga yang tidak dikenali dan dihargai sampai keduanya hilang.
                </p>
            </div>
        </div>

        <div class="card-categori-1" id="kategori">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="card-title-1 text-center">
                            <h3>Kategori Alat</h3>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center review-slider normal-slider">
                    <div class="col-md-6">
                        <div class="card" style="width: 110px; border: 0;">
                            <a href="">
                                <img src="{{ asset('assets/img/kategori/Stetoskop.png') }}" href=""
                                    style="width: 100px; height: 100px;">
                            </a>
                            <p>
                                <center>Alat Kedokteran</center>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="width: 110px; border: 0;">
                            <a href="">
                                <img src="{{ asset('assets/img/kategori/bantu-dengar.png') }}"
                                    style="width: 70px; height: 70px; margin-top: 10px; margin-left: 15px;">
                            </a>
                            <p>
                                <center>Alat Bantu Dengar</center>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="width: 110px; border: 0;">
                            <a href="">
                                <img src="{{ asset('assets/img/kategori/bantu-jalan.jpg') }}" style="width: 100px; height: 80px;">
                            </a>
                            <p>
                                <center>Alat Bantu Jalan</center>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="width: 110px; border: 0;">
                            <a href="">
                                <img src="{{ asset('assets/img/kategori/rapid.jpg') }}" style="width: 100px; height: 100px;">
                            </a>
                            <p>
                                <center>Rapid Test</center>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="width: 110px; border: 0;">
                            <a href="">
                                <img src="{{ asset('assets/img/kategori/p3k.png') }}" style="width: 100px; height: 100px;">
                            </a>
                            <p>
                                <center>Alat P3K</center>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="width: 110px; border: 0;">
                            <a href="">
                                <img src="{{ asset('assets/img/kategori/model.png') }}" style="width: 100px; height: 100px;">
                            </a>
                            <p>
                                <center>Model Kerangka Manusia</center>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="width: 110px; border: 0;">
                            <a href="">
                                <img src="{{ asset('assets/img/kategori/kursiroda.jpeg') }}" style="width: 100px; height: 100px;">
                            </a>
                            <p>
                                <center>Kursi Roda</center>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="width: 110px; border: 0;">
                            <a href="">
                                <img src="{{ asset('assets/img/kategori/termometer.png') }}" style="width: 100px; height: 100px;">
                            </a>
                            <p>
                                <center>Termometer</center>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="latest-news" id="artikel">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="latest-title">
                        <h3>Artikel Terbaru</h3>
                        <p>Beberapa artikel tentang kesehatan ada disini</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-news">
                        <a href="#">
                            <div class="latest-news-bg news-bg-1"></div>
                        </a>
                        <div class="news-text-box">
                            <h3><a href="#">Hari Pendengaran Sedunia 2022</a></h3>
                            <p class="blog-meta">
                                <span class="date"><i class="fas fa-calendar"></i>17 October 2022</span>
                            </p>
                            <p class="excerpt">Hari Pendengaran Sedunia 2022yang pada tahun ini bertema Nasional :
                                "Jaga pendengaran Kita Kini dan Nanti" dan Tema global : " Hear For Life, Listen With
                                Care " .</p>
                            <a class="latest-brand1" href="#" style="text-decoration: none;">Read More...</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-news">
                        <a href="#">
                            <div class="latest-news-bg news-bg-2"></div>
                        </a>
                        <div class="news-text-box">
                            <h3><a href="#">Efek Gaya Hidup Tidak Sehat pada Kesehatan</a></h3>
                            <p class="blog-meta">
                                <span class="date"><i class="fas fa-calendar"></i> 17 Oktober 2022</span>
                            </p>
                            <p class="excerpt">Gaya hidup tidak sehat yang tidak secara sadar atau bahkan sadar
                                dilakukan oleh banyak orang, ternyata dapat berdampak buruk bagi kesehatan</p>
                            <a class="latest-brand1" href="#" style="text-decoration: none;">Read More...</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                    <div class="single-latest-news">
                        <a href="#">
                            <div class="latest-news-bg news-bg-3"></div>
                        </a>
                        <div class="news-text-box">
                            <h3><a href="#" style="text-decoration: none;">Kenali Cara Efektif Merawat Luka
                                    Blister</a></h3>
                            <p class="blog-meta">
                                <span class="date"><i class="fas fa-calendar"></i> 17 Oktober 2022</span>
                            </p>
                            <p class="excerpt">Luka blister perlu ditangani dengan baik agar tidak infeksi. Penting
                                untuk tidak memaksa memecahkan kantong cairannya.</p>
                            <a type="button" class="latest-brand1" data-toggle="modal"
                                data-target=".bd-example-modal-lg">
                                Read More...
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Nama event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img src="{{ asset('assets/img/artikel/blister.png') }}" alt="">
                    <br><br>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Suscipit reprehenderit perferendis, corporis odio nostrum nihil
                        velit repellat delectus quam iste, vitae expedita similique et dolore, aperiam quo. Vel, est nihil!
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
