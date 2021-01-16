{{-- @section('custom-style')
<style>
    .modal-content.border.border-warning {
        width: 160%;
        margin-left: -30%;
    }
</style>
@endsection --}}
{{-- Unit Modal --}}
<div class="modal fade mt-5" id="tambahUnit" data-backdrop="static" tabindex="-1" aria-labelledby="unitLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border border-warning">
            <form action="{{ URL::route('admin-unit.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="unitLabel">Tambah Daftar Unit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="namaUnit" class="col-sm-3 col-form-label">Nama unit</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="namaUnit" name="nama" value="{{ old('nama') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="aliasUnit" class="col-sm-3 col-form-label">Alias unit</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('alias') is-invalid @enderror" id="aliasUnit" name="alias" value="{{ old('alias') }}">
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

{{-- Bagian Modal --}}
<div class="modal fade mt-5 " id="tambahBagian" data-backdrop="static" tabindex="-1" aria-labelledby="bagianLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border border-warning">
            <form action="{{ URL::route('admin-bagian.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="bagianLabel">Tambah Daftar Unit</h5>
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
                                @forelse ($unit as $units)
                                <option value="{{ $units->id }}">{{ $units->nama }}</option>
                                @empty
                                <option disabled>tidak ditemukan daftar unit</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="namaBagian" class="col-sm-3 col-form-label">Nama bagian</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="namaBagian" name="nama" value="{{ old('nama') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_identitasBagian" class="col-sm-3 col-form-label">Nomor identitas bagian</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('no_identitas') is-invalid @enderror" id="no_identitasBagian" name="no_identitas" value="{{ old('no_identitas') }}">
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
