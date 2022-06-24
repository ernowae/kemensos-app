@extends('layouts.app')

@section('content')

<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Sesi</h4>
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

                    <form class="form" method="POST" action="{{ route('sesi.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Tahun Anggaran</label>
                                    <select class="form-control" id="basicSelect" name="tahun_anggaran">
                                        @for ($i = $tahun_anggaran; $i < $tahun_anggaran + 5; $i++)
                                             <option value="{{ $i. '/' . $i+1 }}">{{ $i. '/' . $i+1 }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Status</label>
                                    <select class="form-control" id="basic-select" name="status">
                                        <option value="Aktif">Aktif</option>
                                        <option value="Nonaktif">Nonaktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="fp-date-time">Sesi Mulai</label>
                                <input type="text" id="fp-date-time" class="form-control flatpickr-date-time flatpickr-input active" placeholder="YYYY-MM-DD HH:MM" name="mulai">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="fp-date-time">Sesi Selesai</label>
                                <input type="text" id="fp-date-time" class="form-control flatpickr-date-time flatpickr-input active" placeholder="YYYY-MM-DD HH:MM" name="selesai">
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
