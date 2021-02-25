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
            @if(session('warning'))
                <div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('warning') }}
                </div>
            @endif
            @include('niagabeli.layouts.required')
            <form action="{{ URL::route('detail.update',$transDetail->id) }}" method="POST">
                @method('put')
                {{ csrf_field() }}
                <div class="card mt-4">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title text-white" id="supplierLabel">Surat Penerimaan Barang</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="supplier" class="col-sm-3 col-form-label">Supplier</label>
                            <div class="col-sm-9">
                                <select name="sup_id" id="supplier" class="form-control @error('sup_id') is-invalid @enderror">
                                    <option disabled selected>pilih supplier</option>
                                    @foreach ($sup as $supplier)
                                        <option value="{{ $supplier->id }}" {{ $supplier->id == $spb->sup_id ? 'selected' : null }}> {{ $supplier->nama }}</option>
                                    @endforeach
                                </select>
                                @error('sup_id')
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
                            <label for="spb" class="col-sm-3 col-form-label">Nota SPB</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('nota_spb') is-invalid @enderror" id="spb" name="nota_spb" value="{{ old('nota_spb'). $spb->nota_spb,'default' }}">
                                @error('nota_spb')
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
                            <label for="satuanBarang" class="col-sm-3 col-form-label">Satuan barang</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('satuan') is-invalid @enderror" id="satuanBarang" name="satuan" value="{{ old('satuan').$spb->satuan, 'default'  }}">
                                @error('satuan')
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
                            <label for="jadwal" class="col-sm-3 col-form-label">Jadwal Datang</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control @error('jadwal_datang') is-invalid @enderror" id="jadwal" name="jadwal_datang" value="{{ old('jadwal_datang').$spb->jadwal_datang, 'default'  }}">
                                @error('jadwal_datang')
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
                            <label for="tempo" class="col-sm-3 col-form-label">Tempo Pembayaran</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control @error('tempo_pembayaran') is-invalid @enderror" id="tempo" name="tempo_pembayaran" value="{{ old('tempo_pembayaran').$spb->tempo_pembayaran, 'default'  }}">
                                @error('tempo_pembayaran')
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
                </div>
                <div class="card mt-4">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="supplierLabel">Proses daftar permintaan yang sudah terbeli</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="_terbeli" class="col-sm-3 col-form-label">Jumlah terbeli</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control @error('_terbeli') is-invalid @enderror" id="_terbeli" name="_terbeli" value="{{ old('_terbeli'). $transDetail->_terbeli,'default' }}">
                                @error('_terbeli')
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
                            <label for="_terbayar" class="col-sm-3 col-form-label">Terbayar</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('_terbayar') is-invalid @enderror" id="_terbayar" name="_terbayar" value="{{ old('_terbayar'). $transDetail->_terbayar,'default' }}">
                                @error('_terbayar')
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
                            <label for="tgl_beli" class="col-sm-3 col-form-label">Tanggal pembelian</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control @error('tgl_beli') is-invalid @enderror" id="tgl_beli" name="tgl_beli" value="{{ old('tgl_beli').$transDetail->tgl_beli, 'default'  }}">
                                @error('tgl_beli')
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
                            <label for="ppn" class="col-sm-3 col-form-label">Ppn</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('ppn') is-invalid @enderror" id="ppn" name="ppn" value="{{ old('ppn'). $transDetail->ppn,'default' }}" placeholder="boleh kosong">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nota" class="col-sm-3 col-form-label">Nota Pembelian</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('nota') is-invalid @enderror" id="nota" name="nota" value="{{ old('nota'). $transDetail->nota,'default' }}" placeholder="boleh kosong">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ppn" class="col-sm-3 col-form-label">Harga per item</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control @error('harga_item') is-invalid @enderror" id="harga_item" name="harga_item" value="{{ old('harga_item'). $transDetail->harga_item,'default' }}" placeholder="boleh kosong">
                            </div>
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
</main>
@endsection
