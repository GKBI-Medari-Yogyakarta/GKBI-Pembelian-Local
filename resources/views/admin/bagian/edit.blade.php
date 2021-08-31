@extends('admin.layouts.main')
@section('title','Admin Page Bagian')
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
                <form action="{{ URL::route('admin-bagian.update',$bagian->id) }}" method="POST">
                    @method('put')
                    {{ csrf_field() }}
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="bagianLabel">Edit Data Bagian {{ $bagian->nama }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="unit" class="col-sm-3 col-form-label">Unit</label>

                            <div class="col-sm-9">
                                <select name="unit_id" id="unit" class="form-control @error('unit_id') is-invalid @enderror">
                                    <option selected disabled>pilih unit</option>
                                    @foreach ($unit as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $bagian->unit_id ? 'selected' : null }}> {{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namaBagian" class="col-sm-3 col-form-label">Nama bagian</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="namaBagian" name="nama" value="{{ $bagian->nama }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_identitasBagian" class="col-sm-3 col-form-label">Nomor identitas bagian</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('no_identitas') is-invalid @enderror" id="no_identitasBagian" name="no_identitas" value="{{$bagian->no_identitas }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ URL::route('admin-bagian.index') }}" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
