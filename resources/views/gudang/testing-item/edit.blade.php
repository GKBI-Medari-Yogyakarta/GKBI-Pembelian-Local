@extends('gudang.layouts.main')
@section('title','Edit status pengecekan barang')
@section('status-user','Gudang Page')
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
            @include('gudang.layouts.required')
            <div class="card mt-4">
                <form action="{{ URL::route('test.update',$ti->id) }}" method="POST">
                    @method('put')
                    {{ csrf_field() }}
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="suratJalanLabel">Perbaharui Data Barang Datang</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="noTest" class="col-sm-3 col-form-label">No Agenda Gudang</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="noTest" value="{{ $ti->barangDatang->no_agenda_gudang}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="noTest" class="col-sm-3 col-form-label">No Surat Jalan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="noTest" value="{{ $sj->no_jalan}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="noTest" class="col-sm-3 col-form-label">Nomor Pengecekan/Pengetesan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('no_test') is-invalid @enderror" id="noTest" name="no_test" value="{{ old('no_test') . $ti->no_test, 'default' }}">
                                @error('no_test')
                                    <div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Pengecekan</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control @error('tgl_') is-invalid @enderror" id="tanggal" name="tgl_" value="{{ old('tgl_') . $ti->tgl_, 'default' }}">
                                @error('tgl_')
                                    <div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ URL::route('test.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
