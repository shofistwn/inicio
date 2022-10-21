@extends('layouts.main')

@section('title', 'Login')
@section('content')
    <div class="container">
        <!-- Outer Row -->
        <h1 class="text-center mt-5 font-weight-bold text-monospace text-bold">Login or Registered</span></h1>
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9 mb-2">

                <div class="card o-hidden border-0 shadow-lg mt-3">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="{{ asset('assets/img/login.webp') }}" alt="" width="110%" height="100%">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4 font-weight-bold">Login</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Email Address">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Password">
                                        </div>
                                        <button type="submit" id="btn-login" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="#">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <span class="small">Don't have an account?&nbsp;<a
                                                href="{{ route('register') }}">Register!</a></span>
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
