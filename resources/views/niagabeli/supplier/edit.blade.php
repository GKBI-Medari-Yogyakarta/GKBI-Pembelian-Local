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
                <form action="{{ URL::route('supplier.update',$s->id) }}" method="POST">
                    @method('put')
                    {{ csrf_field() }}
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="supplierLabel">Edit Daftar Supplier</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="kabupaten" class="col-sm-3 col-form-label">Asal Kabupaten</label>
                            <div class="col-sm-9">
                                <select name="kab_id" id="kabupaten" class="form-control @error('kab_id') is-invalid @enderror">
                                    <option selected disabled>pilih kabupaten</option>
                                    @foreach ($k as $kab)
                                    <option value="{{ $kab->id }}" {{ $kab->id == $s->kab_id ? 'selected' : null }}> {{ $kab->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namaSupplier" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="namaSupplier" name="nama" value="{{ $s->nama }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telpSupplier" class="col-sm-3 col-form-label">Telp. Supplier</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control @error('telp') is-invalid @enderror" id="telpSupplier" name="telp" value="{{ $s->telp }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="faxSupplier" class="col-sm-3 col-form-label">FAX Supplier</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('fax') is-invalid @enderror" id="faxSupplier" name="fax" value="{{ $s->fax }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamatSupplier" class="col-sm-3 col-form-label">Detail Alamat Supplier</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamatSupplier" name="alamat" value="{{ $s->alamat }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="emailSupplier" class="col-sm-3 col-form-label">E-mail Supplier</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="emailSupplier" name="email" value="{{ $s->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="attnSupplier" class="col-sm-3 col-form-label">Attn Supplier</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('attn') is-invalid @enderror" id="attnSupplier" name="attn" value="{{ $s->attn }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="npwpSupplier" class="col-sm-3 col-form-label">NPWP Supplier</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('npwp') is-invalid @enderror" id="npwpSupplier" name="npwp" value="{{ $s->npwp }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ URL::route('supplier.index') }}" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
