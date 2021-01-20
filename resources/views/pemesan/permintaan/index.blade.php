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
                <i class="fas fa-table mr-1"></i>
                DataTable Permintaan
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
                                <th rowspan="2" class="text-center align-middle p-0" scope="col">Realisasi</th>
                                <th rowspan="2" class="text-center align-middle p-0" scope="col">Keterangan</th>
                            </tr>
                            <tr>
                                <th class="text-center unit">Unit</th>
                                <th class="text-center pl-0 pr-0">Gudang</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($permintaan as $permintaans)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $permintaans->nm_barang }}</td>
                                <td>{{ $permintaans->spesifikasi }}</td>
                                <td>{{ $permintaans->unit_stok }}</td>
                                <td>{{ $permintaans->gudang_stok }}</td>
                                <td>{{ $permintaans->jumlah }}</td>
                                <td>{{ $permintaans->tgl_diperlukan }}</td>
                                <td>{{ $permintaans->realisasi }}</td>
                                <td>
                                    {{ $permintaans->keterangan }} 
                                    <a href="#" class="btn bg-transparent p-0 align-middle text-center" id="detail" data-toggle="tooltip" data-placement="right" title="Detail">
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
                                <td>1</td>
                                <td>
                                    <a href="#" class="btn bg-transparent p-0 align-middle text-center" id="detail" data-toggle="tooltip" data-placement="top" title="Detail">
                                        <i class="fas fa-info-circle text-info h4 m-0"></i>
                                    </a>
                                </td>
                                {{-- <td>
                                    <a href="edit-siswa.html" class="btn btn-outline-warning">Edit</a>
                                    <a href="#" class="btn btn-outline-danger">Hapus</a>
                                </td> --}}
                            </tr>
                            <tr>
                                <td colspan="9" class="text-center align-middle"><h2><strong>Daftar permintaan kosong!!</strong></h2></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="ml-2 mt-4 mb-4">
                        {{-- <button data-toggle="modal" data-target="#tambahNegara" class="btn btn-outline-primary btn-sm">
                            Negara
                        </button> --}}
                        <button data-toggle="modal" data-target="#tambahPermintaan" class="btn btn-outline-primary btn-sm">
                            Tambah daftar permintaan
                        </button>
                    </div>
                    <div class="mt-2 ml-2">
                        {{-- {{ $alamat->links() }} --}}
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
        // $(function () {
        //     $('[data-toggle="tooltip"]').tooltip()
        // })
        $('#detail').tooltip()
    </script>
@endpush
