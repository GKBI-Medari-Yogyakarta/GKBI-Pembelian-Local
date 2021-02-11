@extends('akuntansi.layouts.main')
@section('title','Akuntansi Page')
@section('status-user','Akuntansi Page')
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
            @error('nama')
            <div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ $message }}
            </div>
            @enderror
            @include('akuntansi.layouts.required')
            <div class="card mt-4">
                <form action="{{ URL::route('rekening.update',$rek->id) }}" method="POST">
                    @method('put')
                    {{ csrf_field() }}
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="supplierLabel">Tambah Daftar Rekening</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="namaBank" class="col-sm-3 col-form-label">Nama Bank</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('bank') is-invalid @enderror" id="namaBank" name="bank" value="{{ $rek->bank }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_rekening" class="col-sm-3 col-form-label">No. Rekening</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control @error('no_rekening') is-invalid @enderror" id="no_rekening" name="no_rekening" value="{{ $rek->no_rekening }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="saldoRek" class="col-sm-3 col-form-label">Saldo <br><strong>(boleh kosong)</strong></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('saldo') is-invalid @enderror" id="saldoRek" name="saldo" value="{{ $rek->saldo }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label">Status Milik</label>
                            <div class="col-sm-9">
                                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                    <option selected disabled>pilih status milik</option>
                                    @if ($rek->status == null)
                                    <option value="supplier">Supplier</option>
                                    <option value="PC. GKBI">PC. GKBI</option>
                                    @else
                                        @if ($rek->status == 'supplier')
                                        <option selected value="supplier">Supplier</option>
                                        <option value="PC. GKBI">PC. GKBI</option>
                                        @else
                                        <option value="supplier">Supplier</option>
                                        <option selected value="PC. GKBI">PC. GKBI</option>
                                        @endif
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sup_id" class="col-sm-3 col-form-label">Supplier <br><strong>(jika milik supplier)</strong></label>
                            <div class="col-sm-9">
                                <select name="sup_id" id="sup_id" class="form-control @error('sup_id') is-invalid @enderror">
                                    <option selected value="">pilih supplier (optional)</option>
                                    @foreach ($sup as $suppliers)
                                    <option value="{{ $suppliers->id }}" {{ $suppliers->id == $rek->sup_id ? 'selected' : null }}> {{ $suppliers->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ URL::route('rekening.index') }}" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
