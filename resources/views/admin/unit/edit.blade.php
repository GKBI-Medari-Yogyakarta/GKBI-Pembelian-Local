@extends('admin.layouts.main')
@section('title','Admin Page Unit')
@section('status-user','Admin Page')
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
                <form action="{{ URL::route('admin-unit.update',$unit->id) }}" method="POST">
                    @method('put')
                    {{ csrf_field() }}
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="unitLabel">Edit Data Unit {{ $unit->nama }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="namaUnit" class="col-sm-3 col-form-label">Nama unit</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="namaUnit" name="nama" value="{{ $unit->nama }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="aliasUnit" class="col-sm-3 col-form-label">Alias unit</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('alias') is-invalid @enderror" id="aliasUnit" name="alias" value="{{ $unit->alias }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
