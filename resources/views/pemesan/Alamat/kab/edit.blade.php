@extends('pemesan.layouts.main')
@section('title','Pemesan Page')
@section('status-user','Pemesan Page')
@section('custom-style')
<style>
    .justify-content-md-center p-2{
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
            <div class="card mt-4">
                <form action="{{ URL::route('kabupaten.update',$kab->id) }}" method="POST">
                    @method('put')
                    {{ csrf_field() }}
                    <div class="card-header bg-dark">
                        <h5 class="card-title text-white" id="provLabel">Edit Data Negara</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="provinsi" class="col-sm-3 col-form-label">Provinsi</label>
                            <div class="col-sm-9">
                                <select name="prov_id" id="provinsi" class="form-control @error('prov_id') is-invalid @enderror">
                                    <option selected disabled>pilih provinsi</option>
                                    @forelse ($p as $prov)
                                    <option value="{{ $prov->id }}">{{ $prov->nama }}</option>
                                    @empty
                                    <option disabled>tidak ditemukan daftar provinsi</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nmKab" class="col-sm-3 col-form-label">Kabupaten</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nmKab" name="nama" value="{{ $kab->nama }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kota" class="col-sm-3 col-form-label">Kota</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota" name="kota" value="{{ $kab->kota }}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ URL::route('negara.index') }}" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
