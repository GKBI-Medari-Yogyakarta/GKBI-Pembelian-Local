@extends('niagabeli.layouts.main')
@section('title','Edit Surat Jalan Page')
@section('status-user','Niagabeli Page')
@section('custom-style')
<style>
    .justify-content-md-center p-2 {
        padding: 40px;
    }
</style>
@section('main')
<main>
    <div class="container">
        <div class="justify-content-md-center p-2">
            @include('niagabeli.layouts.required')
            <div class="card mt-4">
                <form action="{{ URL::route('jalan.update',$sj->id) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="suratJalanLabel">Edit surat jalan dengan nomor {{ $sj->no_jalan }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="suratJalan" class="col-sm-3 col-form-label">Nomor Surat Jalan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('no_jalan') is-invalid @enderror" id="suratJalan" name="no_jalan" value="{{ old('no_jalan') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="arsip" class="col-sm-3 col-form-label">Arsip</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('arsip') is-invalid @enderror" id="arsip" name="arsip" value="{{ old('arsip') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tglSurat" class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control @error('tgl_') is-invalid @enderror" id="tglSurat" name="tgl_" value="{{ old('tgl_') }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ URL::route('jalan.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

