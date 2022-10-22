@extends('layouts.main-without-navbar-footer')

@section('title', 'Edit Profil')
@section('content')
    <div class="user-profile">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card-header py-3">
                        <a href="{{ route('home') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i>&nbsp; Back</a>
                    </div>
                    <div class="user-inner">
                        <h3>Edit Profile</h3>

                        <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nama</label>
                                    <input class="form-control" type="text" placeholder="masukkan nama" name="nama"
                                        value="{{ old('nama', $user->nama) }}">
                                </div>
                                <div class="col-md-6">
                                    <img class="img-fluid rounded border"
                                        src="//project.smkn2trenggalek.sch.id:6500/public/user/{{ $user->foto }}">
                                </div>
                                <div class="col-md-6">
                                    <label>No HP</label>
                                    <input class="form-control" type="text" placeholder="masukkan no hp" name="telepon"
                                        value="{{ old('telepon', $user->telepon) }}">
                                </div>
                                <div class="col-md-6">
                                    <label>Upload Foto</label><br>
                                    <input type="file" accept="image/png,image/jpg,image/jpeg" name="foto">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label>Email</label>
                                    <input class="form-control" type="text" placeholder="masukkan email" name="email"
                                        value="{{ old('email', $user->email) }}">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label>Provinsi</label>
                                    <select class="form-control provinsi-asal" name="provinsi">
                                        <option value="0">Pilih Provinsi</option>
                                        @foreach ($provinces as $province => $value)
                                            <option value="{{ $province }}"
                                                {{ $user->provinsi == $province ? 'selected' : '' }}>
                                                {{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label>Kode Pos</label>
                                    <input class="form-control" type="text" placeholder="masukkan kota" name="kode_pos"
                                        value="{{ old('kode_pos', $user->kode_pos) }}">
                                    </select>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label>Kota</label>
                                    <select class="form-control kota-tujuan" name="kota">
                                        <option value="">Pilih Kota / Kabupaten</option>
                                        @foreach ($city as $key => $name)
                                            <option value="{{ $key }}"
                                                {{ $user->kota == $key ? 'selected' : '' }}>
                                                {{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="textarea">Alamat Lengkap</label>
                                    <textarea class="form-control" rows="2" id="textarea" placeholder="Rt / Rw / Desa / Jalan / Gang"
                                        name="alamat_detail">{{ old('alamat_detail', $user->alamat_detail) }}</textarea>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label>Kecamatan</label>
                                    <input class="form-control" type="text" placeholder="masukkan kecamatan"
                                        name="kecamatan" value="{{ old('kecamatan', $user->kecamatan) }}">
                                </div>
                                <div class="col-md-10 mt-2">
                                    <div class="row">
                                        <a href="{{ route('home') }}" class="btn btn-outline-danger ml-3">Batal</a>
                                        <button type="submit" class="btn btn-outline-success ml-3">submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
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
    </script>
@endsection
