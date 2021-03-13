{{-- Edit Permintaan --}}
<div class="modal fade" id="editPermintaan" data-backdrop="static" tabindex="-1" aria-labelledby="negaraLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border border-warning">
            <form action="{{ URL::route('permintaan-pembelian.update',$permintaan->id) }}" method="POST">
                @method('put')
                {{ csrf_field() }}
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="negaraLabel">Edit Daftar Permintaan dari {{$permintaan->pemesan}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nmPemesan" class="col-sm-3 col-form-label">Nama Pemesan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('pemesan') is-invalid @enderror" id="nmPemesan" name="pemesan" value="{{ $permintaan->pemesan }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_pemesan" class="col-sm-3 col-form-label">Nomor surat pemesan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('no_pemesan') is-invalid @enderror" id="no_pemesan" name="no_pemesan" value="{{ $permintaan->no_pemesan }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_pesanan" class="col-sm-3 col-form-label">Tanggal pesanan</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control @error('tgl_pesanan') is-invalid @enderror" id="tgl_pesanan" name="tgl_pesanan" value="{{ $permintaan->tgl_pesanan }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nm_barang" class="col-sm-3 col-form-label">Nama barang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('nm_barang') is-invalid @enderror" id="nm_barang" name="nm_barang" value="{{ $permintaan->nm_barang }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputspesifikasi" class="col-sm-3 col-form-label">Spesifikasi barang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('spesifikasi') is-invalid @enderror" id="inputspesifikasi" name="spesifikasi" value="{{ $permintaan->spesifikasi }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputkd_barang" class="col-sm-3 col-form-label">Kode barang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('kd_barang') is-invalid @enderror" id="inputkd_barang" name="kd_barang" value="{{ $permintaan->kd_barang }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputunit_stok" class="col-sm-3 col-form-label">Stok barang dari unit</label>
                        <div class="col-sm-9">
                            {{-- <input type="number" class="form-control @error('unit_stok') is-invalid @enderror" id="inputunit_stok" name="unit_stok" value="{{ $permintaan->unit_stok }}"> --}}
                            <input type="number" value="{{ $permintaan->unit_stok }}" name="unit_stok" id="inputunit_stok" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputgudang_stok" class="col-sm-3 col-form-label">Stok barang dari gudang</label>
                        <div class="col-sm-9">
                            {{-- <input type="number" class="form-control @error('gudang_stok') is-invalid @enderror" id="inputgudang_stok" name="gudang_stok" value="{{ $permintaan->gudang_stok }}"> --}}
                            <input type="number" value="{{ $permintaan->gudang_stok }}" name="gudang_stok" id="inputgudang_stok" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputjumlah" class="col-sm-3 col-form-label">Jumlah barang yang diminta</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="inputjumlah" name="jumlah" value="{{ $permintaan->jumlah }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputtgl_diperlukan" class="col-sm-3 col-form-label">Tanggal diperlukan</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control @error('tgl_diperlukan') is-invalid @enderror" id="inputtgl_diperlukan" name="tgl_diperlukan" value="{{ $permintaan->tgl_diperlukan }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputbagian_id" class="col-sm-3 col-form-label">Bagian/unit</label>
                        <div class="col-sm-9">
                            <select name="bagian_id" id="inputbagian_id" class="form-control @error('bagian_id') is-invalid @enderror">
                                <option selected disabled>pilih bagian</option>
                                @foreach ($unit as $item)
                                    <option value="{{$item->id}}" class="" {{ $permintaan->bagian_id == $item->id ? 'selected' : ''}}>{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="action" class="btn btn-primary" value="Simpan">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
