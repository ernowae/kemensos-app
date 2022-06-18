@extends('layouts.app')


@section('content')

   <!-- Knowledge base question Content  -->
   <section id="knowledge-base-question">
    <div class="row">
        <div class="col-lg-3 col-md-5 col-12 order-2 order-md-1">
            <div class="card">
                <div class="card-body">
                    <h6 class="kb-title mb-2">
                        <i data-feather="info" class="font-medium-4 mr-50"></i><span>Related Questions</span>
                    </h6>

                    <div class="list-group list-group-circle mt-1">
                        <a href="javascript:void(0)" class="list-group-item text-body">Tahun Anggaran : <br> {{ $sesi->tahun_anggaran }}</a>
                        <a href="javascript:void(0)" class="list-group-item text-body">Sesi Mulai : <br> {{ $sesi->mulai }}</a>
                        <a href="javascript:void(0)" class="list-group-item text-body">Sesi Berakhir : <br> {{ $sesi->selesai }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-7 col-12 order-1 order-md-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-1">
                        <i data-feather="smartphone" class="font-medium-5 mr-25"></i>
                        <span>Form Pengajuan Bantuan</span>
                    </h4>
                    <form class="form" method="POST" action="{{ route('pengajuan.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="sesi_id" value="{{ $sesi->id }}">
                        <input type="hidden" name="lansia_id" value="{{ $id }}">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Nama Usaha</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="nama_usaha"></textarea>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-4 form-group">
                                    <div class="form-group">
                                        <label for="customFile">KTP</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="ktp">
                                            <label class="custom-file-label" for="customFile">Pilih file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <div class="form-group">
                                        <label for="customFile">KK</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="kk">
                                            <label class="custom-file-label" for="customFile">Pilih file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <div class="form-group">
                                        <label for="customFile">Keterangan Penghasilan</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="penghasilan">
                                            <label class="custom-file-label" for="customFile">Pilih file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Knowledge base question Content ends -->


@endsection
