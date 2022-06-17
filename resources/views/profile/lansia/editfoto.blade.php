@extends('layouts.app')

@section('content')

<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Foto Lansia</h4>
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

                    <form action="{{ route('avatar') }}" method="post">
                        @csrf

                        <intput type="file" name="avatar" required/>

                        {{-- <button type="submit">Submit</button> --}}
                    </form>


                </div>
            </div>
        </div>
    </div>
</section>

@endsection
<script>
    // Set default FilePond options
    FilePond.setOptions({
        server: {
            process: "{{ config('filepond.server.process') }}",
            revert: "{{ config('filepond.server.revert') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ @csrf_token() }}",
            }
        }
    });

    // Create the FilePond instance
    FilePond.create(document.querySelector('input[type="file"]'));
</script>
