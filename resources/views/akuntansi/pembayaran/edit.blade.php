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
            @if(session('warning'))
                <div class="alert alert-success alert-dismissible" role="alert" style="z-index: 1">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('msg') }}
                </div>
            @endif
            <div class="card mt-4">
                @if (!isset($compare))
                <form action="{{ URL::route('payment.store',$us->id) }}" method="post" class="mb-0">
                    @csrf
                    <div class="modal-header bg-info">
                        <h5 class="modal-title text-white" id="supplierLabel">Input Pembayaran => pilih rekening</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="namaBank" class="col-sm-3 col-form-label">Kode barang</label>
                            <div class="col-sm-9">
                                <input readonly type="text" class="form-control" id="namaBank"value="{{ $us->kd_barang }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_rekening" class="col-sm-3 col-form-label">PPN</label>
                            <div class="col-sm-9">
                                <input readonly type="number" class="form-control" id="no_rekening" value="{{ $us->item->ppn_barang }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rekening" class="col-sm-3 col-form-label">Rekening</label>
                            <div class="col-sm-9">
                                <select name="rek_id" id="rekening" class="form-control @error('rek_id') is-invalid @enderror">
                                    <option disabled selected>pilih rekening</option>
                                    @foreach ($rek as $rekening)
                                    <option value="{{ $rekening->id }}">{{ $rekening->bank }}</option>
                                    @endforeach
                                </select>
                                @error('rek_id')
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
                        <a href="{{ URL::route('payment.index') }}" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    </div>
                </form>
                @else
                <form action="{{ URL::route('payment.detail',$us->id) }}" method="POST" class="mb-0">
                    @csrf
                    @method('put')
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="supplierLabel">Input Pembayaran => detail pembayaran</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="kd_barang">Kode barang </label>
                              <input readonly type="text" class="form-control" id="kd_barang"value="{{ $us->kd_barang }}">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="ppn">PPN</label>
                              <input readonly type="number" class="form-control" id="ppn" value="{{ $us->item->ppn_barang }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nm_barang">Nama barang</label>
                                <input readonly type="text" class="form-control" id="nm_barang"value="{{ $us->item->nm_barang }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="pemesan">Nama pemesan</label>
                                <input readonly type="text" class="form-control" id="pemesan"value="{{ $us->item->pemesan }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="rekening">Rekening</label>
                                <input readonly type="text" class="form-control" id="rekening" value="{{ $payment->rekening->bank }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="saldo">Saldo rekening</label>
                                <input readonly type="text" class="form-control" id="saldo" value="{{ $payment->rekening->saldo }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="total">Total harga</label>
                                <input readonly type="text" class="form-control" id="total" value="{{ $payment->total }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="terpakai">Terpakai</label>
                                <input readonly type="text" class="form-control" id="terpakai" value="{{ $payment->terpakai }}">
                            </div>
                        </div>
                        <div class="mt-4"></div>
                        <div class="form-group row">
                            <label for="code" class="col-sm-3 col-form-label">Kode pembayaran</label>
                            <div class="col-sm-9">
                                <input type="text" name="payment_code" class="form-control @error('payment_code') is-invalid @enderror" id="code" value="{{ old('payment_code') }}">
                                @error('payment_code')
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
                            <label for="dibayar" class="col-sm-3 col-form-label">Dibayarkan</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control @error('dibayarkan') is-invalid @enderror" id="dibayar" name="dibayarkan" value="{{ old('dibayarkan') }}" max="{{ $payment->saldo_awal }}">
                                @error('dibayarkan')
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
                            <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Pembayaran</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control @error('payment_date') is-invalid @enderror" id="tanggal" name="payment_date" value="{{ old('payment_date')}}">
                                @error('payment_date')
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
                            <label for="ket" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="ket" value="{{ old('keterangan') }}" placeholder="pembayaran ke ">
                                @error('keterangan')
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
                            <label for="status" class="col-sm-3 col-form-label">Status pembayaran</label>
                            <div class="col-sm-9">
                                <select name="payment_status" id="status" class="form-control @error('payment_status') is-invalid @enderror">
                                    <option disabled selected>pilih 1</option>
                                    <option value="1">Lunas</option>
                                    <option value="0">Belum lunas</option>
                                </select>
                                @error('payment_status')
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
                        <a href="{{ URL::route('payment.index') }}" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection
