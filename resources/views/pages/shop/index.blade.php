@extends('layouts.main')

@section('title', 'Category')
@section('content')
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
                        <input type="text" placeholder="Search">
                        <button><i class="fa fa-search"></i></button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="user">
                        <a href="#" class="btn cart">
                            <i class="fa fa-shopping-cart"></i>
                            <span>(0)</span>
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
                    <h1>Jelajahi Obat</h1>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="card categori_row">
                                <img src="{{ asset('assets/img/obat/acetylcysteine.webp') }}">
                                <div class="container">
                                    <h4><b>1</b></h4>
                                    <p>Architect & Engineer</p>
                                </div>
                            </div>
                            <div class="card categori_row ml-3">
                                <img src="{{ asset('assets/img/obat/mucopect.webp') }}">
                                <div class="container">
                                    <h4><b>2</b></h4>
                                    <p>Architect & Engineer</p>
                                </div>
                            </div>
                            <div class="card categori_row ml-3">
                                <img src="{{ asset('assets/img/obat/panadolcold.webp') }}">
                                <div class="container">
                                    <h4><b>3</b></h4>
                                    <p>Architect & Engineer</p>
                                </div>
                            </div>
                            <div class="card categori_row ml-3">
                                <img src="{{ asset('assets/img/obat/epexol.webp') }}">
                                <div class="container">
                                    <h4><b>4</b></h4>
                                    <p>Architect & Engineer</p>
                                </div>
                            </div>
                            <div class="card categori_row">
                                <img src="{{ asset('assets/img/obat/paratusin.webp') }}">
                                <div div class="container">
                                    <h4><b>5</b></h4>
                                    <p>Architect & Engineer</p>
                                </div>
                            </div>
                            <div class="card categori_row ml-3">
                                <img src="{{ asset('assets/img/obat/rhinosjunior.webp') }}">
                                <div class="container">
                                    <h4><b>6</b></h4>
                                    <p>Architect & Engineer</p>
                                </div>
                            </div>
                            <div class="card categori_row ml-3">
                                <img src="{{ asset('assets/img/obat/rhinosSR.webp') }}">
                                <div class="container">
                                    <h4><b>7</b></h4>
                                    <p>Architect & Engineer</p>
                                </div>
                            </div>
                            <div class="card categori_row ml-3">
                                <img src="{{ asset('assets/img/obat/sanadryl.webp') }}">
                                <div class="container">
                                    <h4><b>8</b></h4>
                                    <p>Architect & Engineer</p>
                                </div>
                            </div>
                            <div class="card categori_row">
                                <img src="{{ asset('assets/img/obat/silex.webp') }}">
                                <div class="container">
                                    <h4><b>9</b></h4>
                                    <p>Architect & Engineer</p>
                                </div>
                            </div>
                            <div class="card categori_row ml-3">
                                <img src="{{ asset('assets/img/obat/tremenza.webp') }}">
                                <div class="container">
                                    <h4><b>10</b></h4>
                                    <p>Architect & Engineer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
