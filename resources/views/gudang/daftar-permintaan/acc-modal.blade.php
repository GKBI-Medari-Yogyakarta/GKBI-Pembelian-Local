{{-- Edit Permintaan --}}
<div class="modal fade" id="accPermintaan" data-backdrop="static" tabindex="-1" aria-labelledby="negaraLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content border border-warning">
            <form action="{{ URL::route('permintaan.update',$permintaan->id) }}" method="POST">
                @method('put')
                {{ csrf_field() }}
                <div class="modal-header bg-primary">
                    <h6 class="modal-title text-white" id="negaraLabel">Acc Daftar Permintaan dari {{$permintaan->pemesan}}</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                {{-- <div class="modal-body">
                    <div class="form-group row">
                        <label for="nmPemesan" class="col-sm-3 col-form-label">Nama Pemesan</label>
                        <div class="col-sm-9">
                            <input disabled type="text" class="form-control" id="nmPemesan" name="pemesan" value="{{ $permintaan->pemesan }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_pemesan" class="col-sm-3 col-form-label">Nomor surat pemesan</label>
                        <div class="col-sm-9">
                            <input disabled type="text" class="form-control" id="no_pemesan" name="no_pemesan" value="{{ $permintaan->no_pemesan }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_pesanan" class="col-sm-3 col-form-label">Tanggal pesanan</label>
                        <div class="col-sm-9">
                            <input disabled type="date" class="form-control" id="tgl_pesanan" name="tgl_pesanan" value="{{ $permintaan->tgl_pesanan }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nm_barang" class="col-sm-3 col-form-label">Nama barang</label>
                        <div class="col-sm-9">
                            <input disabled type="text" class="form-control" id="nm_barang" name="nm_barang" value="{{ $permintaan->nm_barang }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputspesifikasi" class="col-sm-3 col-form-label">Spesifikasi barang</label>
                        <div class="col-sm-9">
                            <input disabled type="text" class="form-control" id="inputspesifikasi" name="spesifikasi" value="{{ $permintaan->spesifikasi }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputunit_stok" class="col-sm-3 col-form-label">Stok barang dari unit</label>
                        <div class="col-sm-9">
                            <input disabled type="number" class="form-control" id="inputunit_stok" name="unit_stok" value="{{ $permintaan->unit_stok }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputgudang_stok" class="col-sm-3 col-form-label">Stok barang dari gudang</label>
                        <div class="col-sm-9">
                            <input disabled type="number" class="form-control" id="inputgudang_stok" name="gudang_stok" value="{{ $permintaan->gudang_stok }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputjumlah" class="col-sm-3 col-form-label">Jumlah barang yang diminta</label>
                        <div class="col-sm-9">
                            <input disabled type="number" class="form-control" id="inputjumlah" name="jumlah" value="{{ $permintaan->jumlah }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputtgl_diperlukan" class="col-sm-3 col-form-label">Tanggal diperlukan</label>
                        <div class="col-sm-9">
                            <input disabled type="date" class="form-control" id="inputtgl_diperlukan" name="tgl_diperlukan" value="{{ $permintaan->tgl_diperlukan }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputbagian_id" class="col-sm-3 col-form-label">Bagian/unit</label>
                        <div class="col-sm-9">
                            <select disabled name="bagian_id" id="inputbagian_id" class="form-control">
                                <option value="{{ $permintaan->bagian->id }}">{{ $permintaan->bagian->nama }}</option>
                            </select>
                        </div>
                    </div>
                </div> --}}
                <div class="modal-footer">
                    <div class="row">
                        <div class="col">
                            @if (!empty($permintaan->gudang_stok))
                            <input type="text" name="action" class="btn btn-primary" value="acc">
                            @else
                            <button disabled class="btn btn-primary">Gudang stok belum diisi</button>
                            @endif
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
