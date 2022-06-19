@extends('layouts.app')

@section('content')

<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Usulan barang</h4>
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

                    <form class="form" method="POST" action="{{ route('barang.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="pengajuan_id" value="{{ $id }}">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">nama Barang</label>
                                    <input name="nama_barang" id="defaultInput" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Jumlah</label>
                                    <input name="jumlah" id="defaultInput" class="form-control" type="number">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Harga</label>
                                    <input name="harga" id="defaultInput" class="form-control" type="number">
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <div class="form-group">
                                    <label for="customFile">Foto Barang</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="foto">
                                        <label class="custom-file-label" for="customFile">Pilih file</label>
                                    </div>
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
