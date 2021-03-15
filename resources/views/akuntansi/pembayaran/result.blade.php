@extends('akuntansi.layouts.main')
@section('title','Riwayat Pembayaran')
@section('status-user','Akuntansi Page')
@section('main')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Riwayat pembayaran</h1>
        @if(session('msg'))
            <div class="alert alert-success alert-dismissible" role="alert" style="z-index: 1">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('msg') }}
            </div>
        @endif
        <div class="card mb-4 mt-4">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <i class="fas fa-table mr-1"></i>
                        DataTable
                    </div>
                    <div class="col text-right">
                        <form action="{{ URL::route('search') }}" method="get">
                            @csrf
                            <input type="month" name="cari" id="cari">
                            <input type="text" name="kd" id="cari">
                            <button type="submit">cari</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered">
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
                            {{-- @if (url()->has()->route('search')) --}}
                            @foreach ($payment as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->saldo_awal }}</td>
                                <td>{{ $item->saldo_awal }}</td>
                            </tr>
                            @endforeach
                            {{-- @endif --}}
                            {{-- @forelse ($payment_iscoming as $item)
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
                            @empty --}}
                            <tr>
                                <td colspan="9" class="text-center h1">Kosong</td>
                            </tr>
                            {{-- @endforelse --}}
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
@endpush
