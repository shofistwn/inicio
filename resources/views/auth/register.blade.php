@extends('layouts.main-without-navbar-footer')

@section('title', 'Register')
@section('content')
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg" style="margin-top: 80px">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <img src="{{ asset('assets/img/registrasi.webp') }}" alt="" width="100%">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4 font-weight-bold">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="nama"
                                        placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="email" name="email"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0 form-password">
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="Password">
                                    </div>
                                    <div class="col-sm-6 form-password">
                                        <input type="password" class="form-control" name="password_confirmation"
                                            id="password" placeholder="Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="#">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <span class="small">Already have an account? <a href="{{ route('login') }}">Login!</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
