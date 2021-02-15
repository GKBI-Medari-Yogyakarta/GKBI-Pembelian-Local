{{--Acc Permintaan --}}
<div class="modal fade" id="accPermintaan" data-backdrop="static" tabindex="-1" aria-labelledby="negaraLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border border-warning">
            <form action="{{ URL::route('transaction.update',$transaction->id) }}" method="POST">
                @method('put')
                {{ csrf_field() }}
                <div class="modal-header bg-primary">
                    <h6 class="modal-title text-white" id="negaraLabel">Acc Daftar Permintaan dari {{$transaction->permintaan->pemesan}}</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="h3"> Konfirmasi status permintaan pembelian .!</h3>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col">
                            @if ($transaction->status_niaga !='acc' && $transaction->status_niaga !== 'tidak')
                            <input type="submit" name="action" class="btn btn-primary" value="acc">
                            @else
                            <button disabled class="btn btn-primary status">status {{ $transaction->status_niaga }}</button>
                            @endif
                        </div>
                        <div class="col">
                            @if ($transaction->status_niaga !=='acc' && $transaction->status_niaga !== 'tidak')
                            <input type="submit" name="action" class="btn btn-warning" value="tidak">
                            @else
                            <button disabled class="btn btn-primary status">status {{ $transaction->status_niaga }}</button>
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
