{{-- Permintaan --}}
<div class="modal fade" id="tambahPermintaan" data-backdrop="static" tabindex="-1" aria-labelledby="negaraLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border border-warning">
            <form action="{{ URL::route('permintaan.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="negaraLabel">Tambah Daftar Permintaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nmPemesan" class="col-sm-3 col-form-label">Nama Pemesan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('pemesan') is-invalid @enderror" id="nmPemesan" name="pemesan" value="{{ old('pemesan') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_pemesan" class="col-sm-3 col-form-label">Nama no_pemesan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('no_pemesan') is-invalid @enderror" id="no_pemesan" name="no_pemesan" value="{{ old('no_pemesan') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kdNegara" class="col-sm-3 col-form-label">Kode Negara</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kdNegara" name="kode" value="{{ old('kode') }}">
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
