<div class="modal fade" id="tambahRekening" data-backdrop="static" tabindex="-1" aria-labelledby="supplierLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border border-warning">
            <form action="{{ URL::route('rekening.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="supplierLabel">Tambah Daftar Rekening</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="namaBank" class="col-sm-3 col-form-label">Nama Bank</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('bank') is-invalid @enderror" id="namaBank" name="bank" value="{{ old('bank') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_rekening" class="col-sm-3 col-form-label">No. Rekening</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control @error('no_rekening') is-invalid @enderror" id="no_rekening" name="no_rekening" value="{{ old('no_rekening') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="saldoRek" class="col-sm-3 col-form-label">Saldo <br><strong>(boleh kosong)</strong></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('saldo') is-invalid @enderror" id="saldoRek" name="saldo" value="{{ old('saldo') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label">Status Milik</label>
                        <div class="col-sm-9">
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                <option selected disabled>pilih status milik</option>
                                <option value="supplier">Supplier</option>
                                <option value="PC. GKBI">PC. GKBI</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kabupaten" class="col-sm-3 col-form-label">Supplier <br><strong>(jika milik supplier)</strong></label>
                        <div class="col-sm-9">
                            <select name="kab_id" id="kabupaten" class="form-control @error('kab_id') is-invalid @enderror">
                                <option selected>pilih supplier (optional)</option>
                                @forelse ($sup as $suppliers)
                                <option value="{{ $suppliers->id }}">{{ $suppliers->nama }}</option>
                                @empty
                                <option disabled>daftar supplier belum ada</option>
                                @endforelse
                            </select>
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
