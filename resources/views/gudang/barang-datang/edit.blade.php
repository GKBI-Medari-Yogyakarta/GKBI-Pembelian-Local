@extends('gudang.layouts.main')
@section('title','Edit barang datang')
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
                <form action="{{ URL::route('bd.update',$bd->id) }}" method="POST">
                    @method('put')
                    {{ csrf_field() }}
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="suratJalanLabel">Perbaharui Data Barang Datang</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="agendaGudang" class="col-sm-3 col-form-label">Nomor Agenda Gudang</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('no_agenda_gudang') is-invalid @enderror" id="agendaGudang" name="no_agenda_gudang" value="{{ old('no_agenda_gudang') . $bd->no_agenda_gudang, 'default' }}">
                                @error('no_agenda_gudang')
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
                            <label for="agendaPembelian" class="col-sm-3 col-form-label">Nomor Agenda Pembelian</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('no_agenda_pembelian') is-invalid @enderror" id="agendaPembelian" name="no_agenda_pembelian" value="{{ old('no_agenda_pembelian') . $bd->no_agenda_pembelian, 'default' }}">
                                @error('no_agenda_pembelian')
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
                        <a href="{{ URL::route('bd.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
