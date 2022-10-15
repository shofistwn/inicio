@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @hasrole('admin')
                            I am a admin!
                        @endhasrole

                        @hasrole('pegawai')
                            I am a pegawai!
                        @endhasrole

                        @hasrole('pelanggan')
                            I am a pelanggan!
                        @endhasrole

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
