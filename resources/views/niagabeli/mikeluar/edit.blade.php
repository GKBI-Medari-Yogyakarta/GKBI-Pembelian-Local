@extends('niagabeli.layouts.main')
@section('title','Edit Mikeluar')
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
            <div class="card mt-4">
                <form action="{{ URL::route('mikeluar.update',$mikeluar->id) }}" method="POST">
                    @method('put')
                    {{ csrf_field() }}
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="suratJalanLabel">Pembuatan MI Ijin Keluar dengan No. pengecekan <strong> {{ $ti->no_test }} </strong></h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="suratMikeluar" class="col-sm-3 col-form-label">Nomor MI Ijin Keluar</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('no_mikeluar') is-invalid @enderror" id="suratMikeluar" name="no_mikeluar" value="{{ old('no_mikeluar') . $mikeluar->no_mikeluar, 'default' }}">
                                @error('no_mikeluar')
                                <div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        {{-- @if ($mikeluar->status_deputi === null)
                        <div class="form-group row">
                            <label for="statusDeputi" class="col-sm-3 col-form-label">Status Deputi</label>
                            <div class="col-sm-9">
                                <select name="status_deputi" id="statusDeputi" class="form-control">
                                    <option selected disabled>pilih</option>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                        @endif --}}
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ URL::route('mikeluar.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
