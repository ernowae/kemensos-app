@extends('layouts.app')

@section('content')

<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Data Lansia</h4>
                </div>
                <div class="card-body">


                    @error ('username','user_id','nama','nik','hp','alamat','wilayah_id','tempat_lahir','tanggal_lahir','pekerjaan','penghasilan','pendidikan','agama')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <div class="alert-body">
                                    {{ $message }}.
                                </div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                    @enderror

                    <form class="form" method="POST" action="{{ route('lansia.store') }}">
                            @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input name="username" id="username" class="form-control @error('username') is-invalid @enderror" type="text" value="{{ old('username') }}">
                                    @error('username')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Nama Lengkap</label>
                                    <input name="nama" id="defaultInput" class="form-control" type="text" value="{{ old('nama') }}">
                                    @error('nama')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Email</label>
                                    <input name="email" id="defaultInput" class="form-control" type="text"value="{{ old('email') }}">
                                    @error('email')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">NIK</label>
                                    <input name="nik" id="defaultInput" class="form-control" type="text" value="{{ old('nik') }}">
                                    @error('nik')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Password</label>
                                    <input name="password" id="defaultInput" class="form-control" type="password" value="{{ old('password') }}">
                                    @error('password')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Nomor HP</label>
                                    <input name="hp" id="defaultInput" class="form-control" type="text" value="{{ old('hp') }}">
                                    @error('hp')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Alamat</label>
                                    <input name="alamat" id="defaultInput" class="form-control" type="text" value="{{ old('alamat') }}">
                                    @error('alamat')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Kecamatan</label>
                                    <select class="form-control" id="basic-select" name="kecamatan">
                                        <option>Pilih Kecamatan :</option>
                                        @foreach ($kecamatan as $item)
                                            <option value="{{ $item->id }} {{ (old("kecamatan") == $item->id ? "selected":"") }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('kecamatan')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Tempat Lahir</label>
                                    <input name="tempat_lahir" id="defaultInput" class="form-control" type="text"  value="{{ old('tempat_lahir') }}">
                                    @error('tempat_lahir')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="fp-date-time">Tanggal Lahir</label>
                                <input type="text" id="fp-date-time" class="form-control flatpickr-input active" placeholder="YYYY-MM-DD" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                                @error('tanggal_lahir')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Pekerjaan</label>
                                    <select class="form-control" id="basic-select" name="pekerjaan">
                                        <option>Pilih Pekerjaan :</option>
                                        <option value="Tidak Bekerja">Tidak Bekerja</option>
                                        <option value="Wiraswasta">Wiraswasta</option>
                                        <option value="Tenaga Pengajar">Tenaga Pengajar</option>
                                        <option value="Pensiunan">Pensiunan</option>
                                        <option value="Nelayan">Nelayan</option>
                                        <option value="Petani">Petani</option>
                                        <option value="Lainya">Lainya</option>
                                    </select>
                                    @error('pekerjaan')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Penghasilan</label>
                                    <input name="penghasilan" id="defaultInput" class="form-control" type="text"  value="{{ old('penghasilan') }}">
                                    @error('penghasilan')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Pendidikan Terakhir</label>
                                    <select class="form-control" id="basic-select" name="pendidikan">
                                        <option>Pilih pendidikan :</option>
                                        <option value="Tidak ada pendidikan">Tidak ada pendidikan</option>
                                        <option value="SD">SD</option>
                                        <option value="SLTP">SLTP</option>
                                        <option value="SLTA">SLTA</option>
                                        <option value="D1">D1</option>
                                        <option value="D3">D3</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                    </select>
                                    @error('pendidikan')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Agama</label>
                                    <select class="form-control" id="basic-select" name="agama">
                                        <option>Pilih Agama :</option>
                                        <option value="islam">Islam</option>
                                        <option value="Kristen Protestan">Kristen Protestan</option>
                                        <option value="Kristen Katholik">Kristen Katholik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                    </select>
                                    @error('agama')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
