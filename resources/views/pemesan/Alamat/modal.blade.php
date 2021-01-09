{{-- Negara --}}
<div class="modal fade" id="tambahNegara" data-backdrop="static" tabindex="-1" aria-labelledby="negaraLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border border-warning">
            <form action="{{ URL::route('negara.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="negaraLabel">Tambah Daftar Negara</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="namaNegara" class="col-sm-3 col-form-label">Negara</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="namaNegara" name="nama" value="{{ old('nama') }}">
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
{{-- Modal Provinsi --}}
<div class="modal fade" id="tambahProv" data-backdrop="static" tabindex="-1" aria-labelledby="provLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border border-primary">
            <form action="{{ URL::route('provinsi.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header bg-warning">
                    <h5 class="modal-title text-white" id="provLabel">Tambah Daftar Provinsi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="negara" class="col-sm-3 col-form-label">Negara</label>
                        <div class="col-sm-9">
                            <select name="negara_id" id="negara" class="form-control @error('negara_id') is-invalid @enderror">
                                <option selected disabled>pilih negara</option>
                                <option value="1">Indonesia</option>
                                <option value="2">Arab Saudi</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nmProv" class="col-sm-3 col-form-label">Provinsi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nmProv" name="nama" value="{{ old('nama') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="aliasProv" class="col-sm-3 col-form-label">Alias</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('alias') is-invalid @enderror" id="aliasProv" name="alias" value="{{ old('alias') }}">
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
{{-- Modal Kabupaten --}}
<div class="modal fade" id="tambahKab" data-backdrop="static" tabindex="-1" aria-labelledby="kabLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border border-info">
            <form action="{{ URL::route('kabupaten.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="kabLabel">Tambah Daftar Kabupaten</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="provinsi" class="col-sm-3 col-form-label">Provinsi</label>
                        <div class="col-sm-9">
                            <select name="prov_id" id="provinsi" class="form-control @error('prov_id') is-invalid @enderror">
                                <option selected disabled>pilih provinsi</option>
                                <option value="1">Daerah Istimewa Yogyakarta</option>
                                <option value="2">Jawa Tengah</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nmKab" class="col-sm-3 col-form-label">Kabupaten</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nmKab" name="nama" value="{{ old('nama') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kota" class="col-sm-3 col-form-label">Kota</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota" name="kota" value="{{ old('kota') }}">
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
