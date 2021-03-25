@extends('akuntansi.layouts.main')
@section('title','Input Pembayaran')
@section('status-user','Akuntansi Page')
@section('main')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Input pembayaran</h1>
        @if(session('msg'))
            <div class="alert alert-success alert-dismissible" role="alert" style="z-index: 1">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('msg') }}
            </div>
        @endif
        @if(session('warning'))
              <div class="modal fade" id="myLargeModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h5 class="modal-title" id="myLargeModalLabel">Pembayaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ session('warning') }}
                        </div>
                        <div class="modal-footer bg-warning">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Understood</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="card mb-4 mt-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                DataTable
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered" id="dataTable_Pay">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th colspan="2" scope="col" class="text-center">Nama</th>
                                <th scope="col">Spesifikasi</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col" class="text-center">Total</th>
                                <th scope="col">PPN</th>
                                <th scope="col">Tempo</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">pemesan</th>
                                <th colspan="3" scope="col" class="text-center">barang</th>
                                <th scope="col">per item</th>
                                <th scope="col">pembelian</th>
                                <th scope="col">harga</th>
                                <th scope="col">barang</th>
                                <th colspan="2" scope="col">pembayaran</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($payment_iscoming as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->pemesan }}</td>
                                <td>{{ $item->nm_barang }}</td>
                                <td>{{ $item->spek_barang }}</td>
                                <td>{{ $item->kd_barang }}</td>
                                <td>{{ $item->harga_item }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tgl_beli)->isoformat('dddd, D MMM Y')}}</td>
                                <td>{{ $item->hrg_barang }}</td>
                                <td>{{ $item->ppn_barang }}</td>
                                @if (!empty($item->tempo_pembayaran))
                                <td>{{ \Carbon\Carbon::parse($item->tempo_pembayaran)->isoformat('dddd, D MMM Y')}}</td>
                                @else
                                <td></td>
                                @endif
                                <td>
                                    <a href="{{ URL::route('payment.input',$item->id) }}" class="btn btn-sm btn-primary">Input</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center h1">Kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@push('tooltip')
<script>
    $('#myLargeModal').modal({show: true});
</script>
<script>
    $(function(){
        $('#dataTable_Pay').DataTable({
        });
      });
</script>
@endpush
