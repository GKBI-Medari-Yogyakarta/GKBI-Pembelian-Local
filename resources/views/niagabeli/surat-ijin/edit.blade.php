@extends('niagabeli.layouts.main')
@section('title','Edit Surat Jalan Page')
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
                <form action="{{ URL::route('sim.update',$sim->id) }}" method="POST">
                    @method('put')
                    {{ csrf_field() }}
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="suratJalanLabel">Perbaharui surat ijin masuk dengan nomor surat jalan <strong> {{ $sim->suratJalan->no_jalan }} </strong></h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="suratIjin" class="col-sm-3 col-form-label">Nomor Surat Ijin Masuk</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('no_ijin') is-invalid @enderror" id="suratIjin" name="no_ijin" value="{{ old('no_ijin') . $sim->no_ijin, 'default' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tglIjin" class="col-sm-3 col-form-label">Tanggal / Jam</label>
                            <div class="col-sm-9">
                                <input type="datetime-local" class="form-control @error('tgl_') is-invalid @enderror" id="tglIjin" name="tgl_" value="old('tgl_').{{ \Carbon\Carbon::parse($sim->tgl_)->format('Y-m-d\Th:i:s'),'default'}}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ URL::route('sim.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
