@extends('gudang.layouts.main')
@section('title','Pembuata NPB Qty')
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
                <form action="{{ URL::route('qty.update',$qty->id) }}" method="POST">
                    @method('put')
                    {{ csrf_field() }}
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="suratJalanLabel">Perbaharui pembuatan NPB Qty</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="agenda" class="col-sm-3 col-form-label">No Agenda Gudang</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="agenda" value="{{ $bd->no_agenda_gudang}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pembelian" class="col-sm-3 col-form-label">No Agenda Pembelian</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="pembelian" value="{{ $bd->no_agenda_pembelian}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namaIdentitas" class="col-sm-3 col-form-label">Bagian</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="namaIdentitas" value="{{ $b->nama}} {{ $b->no_identitas}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="noTest" class="col-sm-3 col-form-label">Nomor Urut</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('no_urut') is-invalid @enderror" id="noTest" name="no_urut" value="{{ old('no_urut') . $qty->no_urut, 'default' }}">
                                @error('no_urut')
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
                        <a href="{{ URL::route('qty.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
