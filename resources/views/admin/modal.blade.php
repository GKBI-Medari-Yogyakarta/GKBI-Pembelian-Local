{{-- Negara --}}
<div class="modal fade" id="tambahUnit" data-backdrop="static" tabindex="-1" aria-labelledby="negaraLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border border-warning">
            <form action="{{ URL::route('admin-unit.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="negaraLabel">Tambah Daftar Unit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="namaUnit" class="col-sm-3 col-form-label">Negara</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="namaUnit" name="nama" value="{{ old('nama') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="aliasUnit" class="col-sm-3 col-form-label">Alias Negara</label>
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
