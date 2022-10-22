@extends('layouts.main')

@section('title', 'Home')
@section('content')

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">CatatanDOCTER</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="{{ route('shop.index') }}">Shop</a>
                    @auth
                        <a class="nav-item nav-link" href="{{ route('user.profile') }}">Profile</a>
                        {{-- <a class="nav-item nav-link" href="">Logout</a> --}}

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-none text-white">LOGOUT</button>
                        </form>
                    @endauth
                    @guest
                        <a class="nav-item nav-link" href="{{ route('login') }}">Login</a>
                        <a class="nav-item nav-link" href="{{ route('register') }}">Registration</a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <center>
                <h1 class="display-4">Di Dalam <span>Tubuh</span> yang<span> Sehat</span><br>Terdapat<span> Jiwa </span>yang
                    <span>Kuat</span>
                </h1>
            </center>
        </div>
    </div>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 info-panel">
                <div class="row">
                    <div class="col-sm">
                        <img src="assets/img/blog.webp" alt="Employee" class="img-fluid float-left">
                        <a class="navbar-brand1" href="#">Artikel</a>
                        <p>Klik untuk informasi lebih lanjut</p>
                    </div>
                    <div class="col-sm">
                        <img src="assets/img/toko2.webp" alt="HiRes" class="img-fluid float-left">
                        <a class="navbar-brand1" href="{{ route('shop.index') }}">Toko Kesehatan</a>
                        <p>Klik untuk informasi lebih lanjut</p>
                    </div>
                    <div class="col-sm">
                        <img src="assets/img/event.webp" alt="Security" class="img-fluid float-left">
                        <a class="navbar-brand1" href="#">Event</a>
                        <p>Klik untuk informasi lebih lanjut</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="row workingspace">
            <div class="col-lg-6">
                <img src="assets/img/image/invest3.webp" alt="Working Space" class="img-fluid">
            </div>
            <div class="col-lg-5">
                <h2><span>INVEST</span> In Your <span>HEALTH</span></h2>
                <p>Waktu dan Kesehatan adalah dua aset berharga yang tidak dikenali dan dihargai sampai keduanya hilang.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center" style="margin-bottom: -30px;">
                <div class="event-title">
                    <h2>Event</h2>
                    <p>Event Kesehatan Terbaru</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="container card1-event">
                    <div class="card card-event">
                        <div class="card-cover cover1">
                            <img src="assets/img/event/covid.webp" style="width: 330px;">
                        </div>
                        <div class="card-content">
                            <h3>Vaksin Covid-19</h3>
                            <p>Program vaksinasi terus gencar dilaksanakan di Kabupaten Trenggalek. Kali ini, Senin
                                (2/8/2021) vaksinasi menyasar pelajar usia 12 hingga 17 tahun yang berlangsung di MTsN 1
                                Trenggalek dan Ponpes Qomarul Hidayah Tugu.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="container card1-event">
                    <div class="card card-event">
                        <div class="card-cover cover1">
                            <img src="assets/img/event/cek.png" style="width: 330px;">
                        </div>
                        <div class="card-content">
                            <h3>Cek Kesehatan Anda!!</h3>
                            <p>Akan diselenggarakan program Cek Kesehatan secara gratis yang
                                dilaksanakan di RSUD DR.SOEDOMO Kabupaten Trenggalek pada 25/10/2022.
                                Program ini dapat diikuti oleh seluruh masyarakat Trenggalek.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="container card1-event">
                    <div class="card card-event">
                        <div class="card-cover cover1">
                            <img src="assets/img/event/donor.webp" style="width: 330px;">
                        </div>
                        <div class="card-content">
                            <h5>UNDIP Gelar Kegiatan Hari Donor Darah Sedunia</h5>
                            <p>Palang Merah Indonesia (PMI) Semarang memperingati Hari Donor Darah Sedunia dengan
                                menggelar kegiatan donor darah di Gedung Widya Puraya Universitas Diponegoro, Kamis
                                (14/7).</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-categori-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="card-title-1">
                            <h3>Kategori Penyakit</h3>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center review-slider normal-slider">
                    <div class="col-md-6">
                        <div class="card" style="width: 110px; border: 0;">
                            <a href="category.html">
                                <img src="assets/img/kategory/jantung.webp" href="category.html"
                                    style="width: 100px; height: 100px;">
                            </a>
                            <p>
                                <center>Penyakit Jantung</center>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="width: 110px; border: 0;">
                            <a href="category.html">
                                <img src="assets/img/kategory/pencernaan.webp"
                                    style="width: 70px; height: 88px; margin-top: 10px; margin-left: 15px;">
                            </a>
                            <p>
                                <center>Saluran Pencernaan</center>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="width: 110px; border: 0;">
                            <a href="category.html">
                                <img src="assets/img/kategory/bidan.webp" style="width: 100px; height: 100px;">
                            </a>
                            <p>
                                <center>Layanan Bidan</center>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="width: 110px; border: 0;">
                            <a href="category.html">
                                <img src="assets/img/kategory/vaksin1.webp" style="width: 100px; height: 100px;">
                            </a>
                            <p>
                                <center>Vaksin COVID-19</center>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="width: 110px; border: 0;">
                            <a href="category.html">
                                <img src="assets/img/kategory/mental.webp" style="width: 100px; height: 100px;">
                            </a>
                            <p>
                                <center>Kesehatan Mental</center>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="width: 110px; border: 0;">
                            <a href="category.html">
                                <img src="assets/img/kategory/testcovid.webp" style="width: 100px; height: 100px;">
                            </a>
                            <p>
                                <center>Test COVID-19</center>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="width: 110px; border: 0;">
                            <a href="category.html">
                                <img src="assets/img/kategory/fludanbatuk.webp" style="width: 100px; height: 100px;">
                            </a>
                            <p>
                                <center>Flu dan Batuk</center>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="width: 110px; border: 0;">
                            <a href="category.html">
                                <img src="assets/img/kategory/demam.webp" style="width: 100px; height: 100px;">
                            </a>
                            <p>
                                <center>Demam</center>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="latest-news">
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
                            <a class="latest-brand1" href="#">Read More...</a>
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
                            <a class="latest-brand1" href="#">Read More...</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                    <div class="single-latest-news">
                        <a href="#">
                            <div class="latest-news-bg news-bg-3"></div>
                        </a>
                        <div class="news-text-box">
                            <h3><a href="#">Kenali Cara Efektif Merawat Luka Blister</a></h3>
                            <p class="blog-meta">
                                <span class="date"><i class="fas fa-calendar"></i> 17 Oktober 2022</span>
                            </p>
                            <p class="excerpt">Luka blister perlu ditangani dengan baik agar tidak infeksi. Penting
                                untuk tidak memaksa memecahkan kantong cairannya.</p>
                            <a class="latest-brand1" href="#">Read More...</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="#" class="btn btn-danger tombol button-news1">Artikel</a>
                </div>
            </div>
        </div>
    </div>
@endsection
