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
        @if(session('msg'))
            <div class="alert alert-success alert-dismissible" role="alert" style="z-index: 1">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('msg') }}
            </div>
        @endif
        <div class="justify-content-md-center p-2">
            @include('gudang.layouts.required')
            <div class="card mt-4">
                <form action="{{ URL::route('item.store',$item->id) }}" method="POST">
                    @method('put')
                    {{ csrf_field() }}
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="suratJalanLabel">Barang diambil oleh pemesan</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="agendaGudang" class="col-sm-3 col-form-label">Nama barang</label>
                            <div class="col-sm-9">
                                <input readonly type="text" class="form-control" id="agendaGudang" value="{{ $item->nm_barang }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="agendaGudang" class="col-sm-3 col-form-label">Kode barang</label>
                            <div class="col-sm-9">
                                <input readonly type="text" class="form-control" id="agendaGudang" value="{{ $item->kd_barang }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="agendaGudang" class="col-sm-3 col-form-label">Spesifikasi</label>
                            <div class="col-sm-9">
                                <input readonly type="text" class="form-control" id="agendaGudang" value="{{ $item->spek_barang }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="agendaGudang" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <input readonly type="text" class="form-control" id="agendaGudang" value="{{ $item->ket_barang }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="agendaGudang" class="col-sm-3 col-form-label">Stok Barang</label>
                            <div class="col-sm-9">
                                <input readonly type="text" class="form-control" id="agendaGudang" value="{{ $item->jml_barang }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlahDiambil" class="col-sm-3 col-form-label">Jumlah diambil</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="jumlah_stok" id="jumlahDiambil" min="0" max="{{ $item->jml_barang }}" value="{{ old('jumlah_stok') }}">
                                @error('jumlah_stok')
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
                        <a href="{{ URL::route('item.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
