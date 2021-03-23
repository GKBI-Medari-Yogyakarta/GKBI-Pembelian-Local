{{-- Permintaan --}}
<div class="modal fade" id="tambahPermintaan" data-backdrop="static" tabindex="-1" aria-labelledby="negaraLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border border-warning">
            <form action="{{ URL::route('permintaan-pembelian.store') }}" method="POST">
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
                        <label for="no_pemesan" class="col-sm-3 col-form-label">Nomor surat pemesan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('no_pemesan') is-invalid @enderror" id="no_pemesan" name="no_pemesan" value="{{ old('no_pemesan') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_pesanan" class="col-sm-3 col-form-label">Tanggal pesanan</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control @error('tgl_pesanan') is-invalid @enderror" id="tgl_pesanan" name="tgl_pesanan" value="{{ old('tgl_pesanan') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nm_barang" class="col-sm-3 col-form-label">Nama barang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('nm_barang') is-invalid @enderror" id="nm_barang" name="nm_barang" value="{{ old('nm_barang') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputspesifikasi" class="col-sm-3 col-form-label">Spesifikasi barang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('spesifikasi') is-invalid @enderror" id="inputspesifikasi" name="spesifikasi" value="{{ old('spesifikasi') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputkd_barang" class="col-sm-3 col-form-label">Kode barang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('kd_barang') is-invalid @enderror" id="inputkd_barang" name="kd_barang" value="{{ old('kd_barang') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputunit_stok" class="col-sm-3 col-form-label">Stok barang dari unit</label>
                        <div class="col-sm-9">
                            <input type="number" value="{{old('unit_stok')}}" class="form-control" name="unit_stok" id="inputunit_stok">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputgudang_stok" class="col-sm-3 col-form-label">Stok barang dari gudang</label>
                        <div class="col-sm-9">
                            <input type="number" value="" name="gudang_stok" id="inputgudang_stok" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputjumlah" class="col-sm-3 col-form-label">Jumlah barang yang diminta</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="inputjumlah" name="jumlah" value="{{ old('jumlah') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputtgl_diperlukan" class="col-sm-3 col-form-label">Tanggal diperlukan</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control @error('tgl_diperlukan') is-invalid @enderror" id="inputtgl_diperlukan" name="tgl_diperlukan" value="{{ old('tgl_diperlukan') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputbagian_id" class="col-sm-3 col-form-label">Bagian/unit</label>
                        <div class="col-sm-9">
                            <select name="bagian_id" id="inputbagian_id" class="form-control @error('bagian_id') is-invalid @enderror">
                                <option selected disabled>pilih bagian</option>
                                @forelse ($unit as $bagian)
                                <option value="{{ $bagian->id }}">no/nama : {{ $bagian->no_identitas }} / {{ $bagian->nama }}</option>
                                @empty
                                <option disabled>tidak ditemukan daftar bagian</option>
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
