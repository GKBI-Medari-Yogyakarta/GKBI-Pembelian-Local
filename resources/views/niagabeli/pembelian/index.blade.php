@extends('niagabeli.layouts.main')
@section('title','Niagabeli Page')
@section('status-user','Niagabeli Page')
@section('main')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Data Permintaan Pembelian</h1>
        @if(session('msg'))
        <div class="alert alert-success alert-dismissible" role="alert" style="z-index: 1">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session('msg') }}
        </div>
        @endif
        @include('niagabeli.layouts.required')
        <div class="card mb-4 mt-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                DataTable Permintaan Pembelian
            </div>
            <div class="card-body p-2">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-sm">
                        <thead>
                            <tr>
                                <th rowspan="2" class="text-center align-middle p-0" scope="col">#</th>
                                <th rowspan="2" class="text-center align-middle p-0" scope="col">Nama Barang</th>
                                <th rowspan="2" class="text-center align-middle p-0" scope="col">Spesifikasi</th>
                                <th colspan="2" class="text-center align-middle p-0" class="text-center">Stok</th>
                                <th rowspan="2" class="text-center align-middle p-0" scope="col">Jumlah</th>
                                <th rowspan="2" class="text-center align-middle p-0" scope="col">Tanggal Diperlukan</th>
                                <th rowspan="2" class="text-center align-middle p-0" scope="col">Keterangan</th>
                                <th rowspan="2" class="text-center align-middle p-0" scope="col">Aksi</th>
                            </tr>
                            <tr>
                                <th class="text-center unit">Unit</th>
                                <th class="text-center pl-0 pr-0">Gudang</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($permintaan as $p)
                            <tr @if(empty($p->status_niaga_pembelian)) class="text-danger" @endif>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->nm_barang }}</td>
                                <td>{{ $p->spesifikasi }}</td>
                                <td>{{ $p->unit_stok }}</td>
                                <td>{{$p->gudang_stok}}</td>
                                <td>{{ $p->rencana_beli }}</td>
                                <td>{{\Carbon\Carbon::parse($p->tgl_diperlukan)->isoFormat('dddd, D MMM Y') }}</td>
                                <td>
                                    {{ $p->keterangan }}
                                </td>
                                <td>
                                    @if ($p->status_beli !== '1')
                                        @if ($p->status_niaga === 'acc')
                                        <a class="btn btn-primary" href="{{ URL::route('detail.edit',$p->id) }}">proses pembelian</a>
                                        @else
                                        <button disabled class="btn btn-warning">data belum lengkap</button>
                                        @endif
                                    @else
                                    <button disabled class="btn btn-outline-danger">sudah terbeli</button>
                                    @endif
                                    <a href="{{ URL::route('transaction.show',$p->id) }}" class="btn bg-transparent p-0 align-middle text-center" id="detail" data-toggle="tooltip" data-placement="right" title="Detail">
                                        <i class="fas fa-info-circle text-info h4 m-0"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center align-middle"><h2><strong>Daftar permintaan kosong!!</strong></h2></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-2 ml-0">
                        {{ $permintaan->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Modal -->
@endsection
@push('tooltip')
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip({
            delay: {show:0,hide:1500}
        });
    })
</script>
@endpush
