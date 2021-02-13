{{-- Permintaan Pembelian (Transaction)--}}
<div class="modal fade" id="updatePembelian" data-backdrop="static" tabindex="-1" aria-labelledby="negaraLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border border-warning">
            <form action="{{ URL::route('transaction.update',$transaction->id) }}" method="POST">
                @method('put')
                {{ csrf_field() }}
                <div class="modal-header bg-primary">Perbaharui Daftar Permintaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputNoNiaga">Nomor Surat</label>
                            <input type="text" class="form-control @error('no_niaga') is-invalid @enderror" id="inputNoNiaga" name="no_niaga" value="{{ old('no_niaga') . $transaction->no_niaga, 'Default' }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputDate">Tanggal</label>
                            <input type="date" min="2021-01-01" class="form-control @error('tgl_status') is-invalid @enderror" id="inputDate" name="tgl_status">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputPlanPay">Rencana beli</label>
                            <input type="text" class="form-control @error('rencana_beli') is-invalid @enderror" id="inputPlanPay" name="rencana_beli" value="{{ old('rencana_beli') . $transaction->rencana_beli, 'Default' }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPlanAmount">Perkiraan biaya</label>
                            <input type="number" class="form-control" id="inputPlanAmount" name="perkiraan_biaya" value="{{ old('perkiraan_biaya') . $transaction->perkiraan_biaya, 'Default' }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputPayType">Metode pembayaran</label>
                            <select name="payment_type" id="inputPayType" class="form-control @error('payment_type') is-invalid @enderror">
                                <option value="hutang">Hutang</option>
                                <option value="credit">Credit</option>
                                <option value="cash">Cash</option>
                                <option value="barter">Barter</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputNoPembelian">Nomor pembelian</label>
                            <input type="text" class="form-control @error('no_transaction') is-invalid @enderror" id="inputNoPembelian" name="no_transaction" value="{{ old('no_transaction') . $transaction->no_transaction, 'Default' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputKeterangan">Keterangan</label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" id="inputKeterangan" rows="3" name="keterangan"></textarea>
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
