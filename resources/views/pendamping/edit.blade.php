@extends('layouts.app')

@section('content')

<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Data Pendamping</h4>
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

                    <form class="form" method="POST" action="{{ route('pendamping.update', [$pendamping->id]) }}">
                        @csrf
                        <input type="hidden" value="PUT" name="_method">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input name="username" id="username" class="form-control @error('username') is-invalid @enderror" type="text" value="{{ $pendamping->user->name }}">
                                    @error('username')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Nama Lengkap</label>
                                    <input name="nama" id="defaultInput" class="form-control" type="text" value="{{ $pendamping->nama }}">
                                    @error('nama')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Email</label>
                                    <input name="email" id="defaultInput" class="form-control" type="text"value="{{ $pendamping->user->email }}">
                                    @error('email')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">NIK</label>
                                    <input name="nik" id="defaultInput" class="form-control" type="text" value="{{ $pendamping->nik }}">
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
                                    <input name="hp" id="defaultInput" class="form-control" type="text" value="{{ $pendamping->hp }}">
                                    @error('hp')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Alamat</label>
                                    <input name="alamat" id="defaultInput" class="form-control" type="text" value="{{ $pendamping->alamat }}">
                                    @error('alamat')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column" class="text-primary"><b>Wilayah Kerja</b></label>
                                    <select class="form-control" id="basic-select" name="kecamatan">
                                        <option value="">Pilih Kecamatan :</option>
                                        @foreach ($kecamatan as $item)
                                            <option value="{{ $item->id }}" {{ $item->id == $pendamping->wilayah_id ? 'selected':''}}>{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('kecamatan')<p class="text-danger">{{ $message }}</p>@enderror
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
