@extends('gudang.layouts.main')
@section('title','Gudang Page')
@section('status-user','Gudang Page')
@section('main')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
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
                <i class="fas fa-table mr-1"></i>
                DataTable daftar permintaan pembelian
            </div>
            <div class="card-body">
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
                            </tr>
                            <tr>
                                <th class="text-center unit">Unit</th>
                                <th class="text-center pl-0 pr-0">Gudang</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($permintaans as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->nm_barang }}</td>
                                <td>{{ $p->spesifikasi }}</td>
                                <td>{{ $p->unit_stok }}</td>
                                @if (empty($perminstaans->gudang_stok))
                                <td>{{$p->gudang_stok}}</td>
                                @else
                                <td>belum dilihat / diupdate dari unit Gudang</td>
                                @endif
                                <td>{{ $p->jumlah }}</td>
                                <td>{{ $p->tgl_diperlukan }}</td>
                                <td>
                                    {{ $p->keterangan }}
                                    <a href="{{ URL::route('permintaan.show',$p->id) }}" class="btn bg-transparent p-0 align-middle text-center" id="detail" data-toggle="tooltip" data-placement="right" title="Detail">
                                        <i class="fas fa-info-circle text-info h4 m-0"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>
                                    <a href="#" class="btn bg-transparent p-0 align-middle text-center" id="detail" data-toggle="tooltip" data-placement="top" title="Detail">
                                        <i class="fas fa-info-circle text-info h4 m-0"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>
                                    <a href="#" class="btn bg-transparent p-0 align-middle text-center" id="detail" data-toggle="tooltip" data-placement="top" title="Detail">
                                        <i class="fas fa-info-circle text-info h4 m-0"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="8" class="text-center align-middle"><h2><strong>Daftar permintaan kosong!!</strong></h2></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="ml-2 mt-4 mb-4">
                        {{-- <button data-toggle="modal" data-target="#tambahPermintaan" class="btn btn-outline-primary btn-sm">
                            Tambah daftar permintaan
                        </button> --}}
                        {{-- {{ $alamat->links() }} --}}
                    </div>
                    {{-- <div class="mt-2 ml-2">
                        {{ $alamat->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
