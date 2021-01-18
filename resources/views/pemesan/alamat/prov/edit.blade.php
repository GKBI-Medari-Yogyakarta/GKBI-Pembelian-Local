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
                <form action="{{ URL::route('provinsi.update',$prov->id) }}" method="POST">
                    @method('put')
                    {{ csrf_field() }}
                    <div class="card-header bg-warning">
                        <h5 class="card-title text-white" id="provLabel">Edit Data Negara</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="negara" class="col-sm-3 col-form-label">Negara</label>
                            <div class="col-sm-9">
                                <select name="negara_id" id="negara" class="form-control @error('negara_id') is-invalid @enderror">
                                    <option disabled>pilih negara</option>
                                    @foreach ($n as $negara)
                                        <option value="{{ $negara->id }}" {{ $negara->id == $prov->negara_id ? 'selected' : null }}> {{ $negara->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nmProv" class="col-sm-3 col-form-label">Provinsi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nmProv" name="nama" value="{{ $prov->nama }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="aliasProv" class="col-sm-3 col-form-label">Alias</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('alias') is-invalid @enderror" id="aliasProv" name="alias" value="{{ $prov->alias }}">
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
