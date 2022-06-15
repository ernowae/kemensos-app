 <!-- Modal -->
 <div class="modal fade text-left" id="backdrop-{{ $loop->index }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel4">Detail Data Pengajuan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <div class="card business-card">
                    <div class="card-header pb-1">
                        <h4 class="card-title">Biodata</h4>
                    </div>
                    <div class="card-body">
                        <dl class="row square-border">
                            <dt class="col-sm-3">Nama</dt>
                            <dd class="col-sm-9">{{ $data->lansia->nama }}.</dd>
                            <dt class="col-sm-3">NIK</dt>
                            <dd class="col-sm-9">{{ $data->lansia->nik }}.</dd>
                            <dt class="col-sm-3">Pendamping</dt>
                            <dd class="col-sm-9"><div class="badge badge-glow badge-primary">{{ $data->lansia->pendamping->nama }}.</div></dd>
                            <dt class="col-sm-3">Total Barang</dt>
                            <dd class="col-sm-9">{{ $data->barang->count() }} Item.</dd>
                            <dt class="col-sm-3">Total Usulan</dt>
                            <dd class="col-sm-9">Rp. {{  number_format($data->barang->sum('harga')); }}</dd>
                        </dl>
                        <h6 class="mb-75">Detail Barang Usulan</h6>
                        <form class="form" method="POST" action="{{ route('barang-pimpinan.updateusulan', [$data->id]) }}">
                            @csrf
                            <input type="hidden" value="PUT" name="_method">
                            <div class="business-items">

                                @foreach ($data->barang as $i => $barang)
                                {{-- id --}}
                               <input type="text" name="id[]" hidden value="{{ $barang->id }}">

                                <div class="business-item">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="custom-control custom-checkbox">

                                            <input type="hidden" name="status[{{ $i }}]" value="0">
                                            <input type="checkbox" class="custom-control-input" id="business-checkbox-{{$i}}"name="status[{{ $i }}]" value="1" {{ $barang->status == 1 ? 'checked' : '' }}>

                                            <label class="custom-control-label" for="business-checkbox-{{$i}}">{{ $barang->nama_barang }} | Jumlah Barang : {{ $barang->jumlah }}</label>
                                        </div>
                                        <div class="badge badge-light-success">Rp. {{  number_format($barang->harga); }}</div>
                                    </div>
                                    {{-- keterangan --}}
                                    <input name="keterangan[]" value="{{ $barang->keterangan }}" type="text" id="payment-input-name" class="form-control mt-2" placeholder="Catatan">
                                </div>

                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary btn-block waves-effect waves-float waves-light">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
