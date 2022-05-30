@extends('layouts.app')

@section('content')

<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Wilayah</h4>
                </div>
                <div class="card-body">


                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <div class="alert-body">
                                    {{ $error }}.
                                </div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endforeach
                    @endif

                    <form class="form" method="POST" action="{{ route('wilayah.update', [$wilayah->id]) }}">
                        @csrf
                        <input type="hidden" value="PUT" name="_method">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Nama Wilayah</label>
                                    <input name="nama" id="defaultInput" class="form-control" type="text" value="{{ $wilayah->nama }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Level Wilayah</label>
                                    <select class="form-control" id="basic-select" name="level">
                                        <option value="3" {{ $wilayah->level == '3' ? 'Selected' : '' }}>Kabupaten/Kota</option>
                                        <option value="4" {{ $wilayah->level == '4' ? 'Selected' : '' }}>Kecamatan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Induk Wilayah</label>
                                    <select class="form-control" id="basic-select" name="induk">
                                        <option value="">Pilih Induk Wilayah :</option>
                                        @foreach ($induk as $item)
                                        <option value="{{ $item->id }}" {{ $wilayah->induk == $item->id ? 'Selected' : '' }}>{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
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
