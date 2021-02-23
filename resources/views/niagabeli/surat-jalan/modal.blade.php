<div class="modal fade" id="suratJalan" data-backdrop="static" tabindex="-1" aria-labelledby="suratJalanLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border border-warning">
            <form action="{{ URL::route('jalan.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="suratJalanLabel">Tambah Surat Jalan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="suratJalan" class="col-sm-3 col-form-label">Barang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('no_jalan') is-invalid @enderror" id="suratJalan" name="no_jalan" value="{{ old('no_jalan') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="suratJalan" class="col-sm-3 col-form-label">Nomor Surat Jalan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('no_jalan') is-invalid @enderror" id="suratJalan" name="no_jalan" value="{{ old('no_jalan') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="arsip" class="col-sm-3 col-form-label">Arsip</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('arsip') is-invalid @enderror" id="arsip" name="arsip" value="{{ old('arsip') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tglSurat" class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control @error('tgl_') is-invalid @enderror" id="tglSurat" name="tgl_" value="{{ old('tgl_') }}">
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
