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
                <form action="{{ URL::route('negara.update',$negara->id) }}" method="POST">
                    @method('put')
                    {{ csrf_field() }}
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-white" id="negaraLabel">Edit Data Negara</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="namaNegara" class="col-sm-3 col-form-label">Negara</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="namaNegara" name="nama" value="{{ $negara->nama }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kdNegara" class="col-sm-3 col-form-label">Kode Negara</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kdNegara" name="kode" value="{{ $negara->kode }}">
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
