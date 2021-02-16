@extends('niagabeli.layouts.main')
@section('title','Niagabeli Page')
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
                <form action="{{ URL::route('detail.update',$transDetail->id) }}" method="POST">
                    @method('put')
                    {{ csrf_field() }}
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="supplierLabel">Proses daftar permintaan yang sudah terbeli</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="_terbeli" class="col-sm-3 col-form-label">Jumlah terbeli</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control @error('_terbeli') is-invalid @enderror" id="_terbeli" name="_terbeli" value="{{ $transDetail->_terbeli }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="_terbayar" class="col-sm-3 col-form-label">Terbayar</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('_terbayar') is-invalid @enderror" id="_terbayar" name="_terbayar" value="{{ $transDetail->_terbayar }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl_beli" class="col-sm-3 col-form-label">Tanggal pembelian</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control @error('tgl_beli') is-invalid @enderror" id="tgl_beli" name="tgl_beli" value="{{ old('tgl_beli').$transDetail->tgl_beli, 'default'  }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ppn" class="col-sm-3 col-form-label">Ppn</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('ppn') is-invalid @enderror" id="ppn" name="ppn" value="{{ $transDetail->ppn }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ URL::route('transaction.index') }}" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
