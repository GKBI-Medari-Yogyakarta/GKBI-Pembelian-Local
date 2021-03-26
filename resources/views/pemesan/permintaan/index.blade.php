@extends('pemesan.layouts.main')
@section('title','Pemesan Page')
@section('status-user','Pemesan Page')
@section('main')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Permintaan</h1>
        @if(session('msg'))
            <div class="alert alert-success alert-dismissible" role="alert" style="z-index: 1">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('msg') }}
            </div>
        @endif
        @include('pemesan.layouts.required')
        <div class="card mb-4 mt-4">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <i class="fas fa-table"></i>
                        DataTable Permintaan
                    </div>
                    <div class="col">
                        <form action="{{ url()->current() }}">
                            <div class="form-row">
                                <div class="col col-sm-6">
                                    <input type="text" class="form-control form-control-sm" name="keyword" placeholder="cari nama barang atau kode barang" value="{{ request('keyword') }}">
                                </div>
                                <div class="col col-sm-3">
                                    <input type="number" class="form-control form-control-sm" name="limit" min="0" placeholder="limit" value="{{ request('limit') }}">
                                </div>
                                <div class="col col-sm-3 text-right">
                                    <button type="submit" class="btn btn-sm btn-info">cari</button>
                                    <a href="{{ URL::route('permintaan-pembelian.index') }}" class="btn btn-sm btn-primary">clear</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-sm" width="100%">
                        <thead>
                            <tr>
                                <th rowspan="2" class="text-center align-middle p-0" scope="col">#</th>
                                <th rowspan="2" class="text-center align-middle p-0" scope="col">Nama Barang</th>
                                <th rowspan="2" class="text-center align-middle p-0" scope="col">Spesifikasi</th>
                                <th rowspan="2" class="text-center align-middle p-0" scope="col">Kode</th>
                                <th colspan="2" class="text-center align-middle p-0" class="text-center">Stok</th>
                                <th rowspan="2" class="text-center align-middle p-0" scope="col">Jumlah</th>
                                <th rowspan="2" class="text-center align-middle p-0" scope="col">Tanggal Diperlukan</th>
                                <th rowspan="2" class="text-center align-middle p-0" scope="col">Keterangan</th>
                            </tr>
                            <tr>
                                <th class="text-center unit">Unit</th>
                                <th class="text-center pl-0 pr-0">Gudang</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($permintaan as $permintaans)
                            <tr @if (empty($permintaans->status_direktur)) class="text-danger" @endif>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $permintaans->nm_barang }}</td>
                                <td>{{ $permintaans->spesifikasi }}</td>
                                <td>{{ $permintaans->kd_barang }}</td>
                                <td>{{ $permintaans->unit_stok }}</td>
                                @if (!empty($permintaans->gudang_stok))
                                <td>{{$permintaans->gudang_stok}}</td>
                                @else
                                <td>belum dilihat / diupdate dari unit Gudang</td>
                                @endif
                                <td>{{ $permintaans->jumlah }}</td>
                                <td> {{\Carbon\Carbon::parse($permintaans->tgl_diperlukan)->isoFormat('dddd, D MMM Y') }} </td>
                                <td>
                                    {{ $permintaans->keterangan }}
                                    <a href="{{ URL::route('permintaan-pembelian.show',$permintaans->id) }}" class="btn bg-transparent p-0 align-middle text-center" id="detail" data-toggle="tooltip" data-placement="right" title="Detail">
                                        <i class="fas fa-info-circle text-info h4 m-0"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center align-middle"><h2><strong>Daftar permintaan kosong!!</strong></h2></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="ml-2 mt-4 mb-4">
                        <button data-toggle="modal" data-target="#tambahPermintaan" class="btn btn-outline-primary btn-sm">
                            Tambah daftar permintaan
                        </button>
                    </div>
                    <div class="mt-2 ml-2">
                        {{ $permintaan->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Modal -->
@include('pemesan.permintaan.modal')
@endsection
@push('tooltip')
    <script>
         $(function () {
             $('[data-toggle="tooltip"]').tooltip('show')
         })
    </script>
@endpush
