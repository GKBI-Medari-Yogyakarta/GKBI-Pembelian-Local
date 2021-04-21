@extends('niagabeli.layouts.main')
@section('title','Edit Mikeluar')
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
            <div class="card mt-4">
                <form action="{{ URL::route('ijin-keluar.update',$ijin_keluar->id) }}" method="POST" class="mb-0">
                    @method('put')
                    {{ csrf_field() }}
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="suratJalanLabel">Input data surat MI Ijin Keluar dengan No. MI Keluar <strong> {{ $ijin_keluar->mikeluar->no_mikeluar }} </strong></h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="tglSurat" class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control @error('tgl_') is-invalid @enderror" id="tglSurat" name="tgl_" value="{{ old('tgl_') . $ijin_keluar->tgl_, 'default' }}">
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
                        <div class="form-group row">
                            <label for="inputKeterangan" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control @error('ket_') is-invalid @enderror" id="inputKeterangan" rows="3" name="ket_">{{ old('ket_') . $ijin_keluar->ket_,'default' }}</textarea>
                                @error('ket_')
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
                    <div class="modal-footer pb-0">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ URL::route('ijin-keluar.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
