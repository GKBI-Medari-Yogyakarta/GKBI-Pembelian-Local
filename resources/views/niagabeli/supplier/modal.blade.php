<div class="modal fade" id="tambahSupplier" data-backdrop="static" tabindex="-1" aria-labelledby="supplierLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border border-warning">
            <form action="{{ URL::route('supplier.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="supplierLabel">Tambah Daftar Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="kabupaten" class="col-sm-3 col-form-label">Asal Kabupaten</label>
                        <div class="col-sm-9">
                            <select name="kab_id" id="kabupaten" class="form-control @error('kab_id') is-invalid @enderror">
                                <option selected disabled>pilih kabupaten</option>
                                @forelse ($kabupatens as $k)
                                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                @empty
                                <option disabled>daftar kabupaten belum ada</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="namaSupplier" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="namaSupplier" name="nama" value="{{ old('nama') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telpSupplier" class="col-sm-3 col-form-label">Telp. Supplier</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control @error('telp') is-invalid @enderror" id="telpSupplier" name="telp" value="{{ old('telp') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="faxSupplier" class="col-sm-3 col-form-label">FAX Supplier</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('fax') is-invalid @enderror" id="faxSupplier" name="fax" value="{{ old('fax') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamatSupplier" class="col-sm-3 col-form-label">Detail Alamat Supplier</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamatSupplier" name="alamat" value="{{ old('alamat') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="emailSupplier" class="col-sm-3 col-form-label">E-mail Supplier</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="emailSupplier" name="email" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="attnSupplier" class="col-sm-3 col-form-label">Attn Supplier</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('attn') is-invalid @enderror" id="attnSupplier" name="attn" value="{{ old('attn') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="npwpSupplier" class="col-sm-3 col-form-label">NPWP Supplier</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('npwp') is-invalid @enderror" id="npwpSupplier" name="npwp" value="{{ old('npwp') }}">
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
