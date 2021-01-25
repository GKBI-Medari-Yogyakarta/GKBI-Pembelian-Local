@extends('gudang.layouts.main')
@section('title','Gudang Page')
@section('status-user','Gudang Page')
@section('custom-style')
    <style>
        .h-nomor{
            width: 10%;
            height: 10%;
        }
        .h-t{
            height: 10%;
        }
        .w-titik{
            width: 1%;
        }
        table.nav-right.table.table-borderless.table-sm.mb-0 {
            margin-top: 27%;
        }
        .img-ttd{
            width: 70%;
        }
    </style>
@section('main')
<div class="container-fluid">
    @if(session('msg'))
        <div class="alert alert-success alert-dismissible" role="alert" style="z-index: 1">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session('msg') }}
        </div>
    @endif
    @include('gudang.layouts.required')
    <div class="card mb-4 mt-4">
        <div class="card-header">
            <div class="row p-0">
                <div class="col p-0 m-0">
                    <h5 class="m-0"><strong>PC. GKBI</strong></h5>
                    <p class="m-0">Medari, Sleaman, Yogyakarta</p>
                    <p class="mt-5 mb-0">Unit NIAGA</p>
                    <p class="mb-4">Bagian Pembelian</p>
                    <table class="table table-borderless table-sm mb-0">
                        <tbody>
                            <tr>
                                <th scope="row" class="h-nomor pl-0">Nomor</th>
                                <td class="h-t w-titik"><strong>:</strong></td>
                                <td colspan="3" class="h-t pl-0">Mark</td>
                            </tr>
                            <tr>
                                <th scope="row" class="h-nomor pl-0">Tanggal</th>
                                <td class="h-t w-titik"><strong>:</strong></td>
                                <td colspan="3" class="h-t pl-0">Jacob</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col p-0 m-0">
                    <h4 class="text-center">PERMINTAAN PEMBELIAN <br>BARANG</h4>
                </div>
                <div class="col p-0 m-0">
                    <table class="nav-right table table-borderless table-sm mb-0">
                        <tbody>
                            <tr>
                                <th scope="row" class="h-nomor pl-5">Pemesan</th>
                                <td class="h-t text-right"><strong>:</strong></td>
                                <td colspan="3" class="h-t pl-0">{{$permintaan->pemesan}}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="h-nomor pl-5">Unit/Bagian</th>
                                <td class="h-t text-right"><strong>:</strong></td>
                                <td colspan="3" class="h-t pl-0">{{$permintaan->bagian->nama}}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="h-nomor pl-5">Nomor</th>
                                <td class="h-t text-right"><strong>:</strong></td>
                                <td colspan="3" class="h-t pl-0">{{$permintaan->no_pemesan}}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="h-nomor pl-5">Tanggal</th>
                                <td class="h-t text-right"><strong>:</strong></td>
                                <td colspan="3" class="h-t pl-0"> {{\Carbon\Carbon::parse($permintaan->tgl_pesanan)->translatedFormat('d F Y') }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-body m-0 p-0">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th rowspan="2" class="text-center align-middle p-0" scope="col">#</th>
                        <th rowspan="2" class="text-center align-middle p-0" scope="col">Nama Barang & Spesifikasi</th>
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
                    <tr>
                        <th scope="row">{{$permintaan->id}}</th>
                        <td>{{$permintaan->nm_barang}} / {{$permintaan->spesifikasi}}</td>
                        <td>{{$permintaan->unit_stok}}</td>
                        @if (empty($permintaan->gudang_stok))
                        <td>{{$permintaan->gudang_stok}}</td>
                        @else
                        <td>belum dilihat / diupdate dari unit Gudang</td>
                        @endif
                        <td>{{$permintaan->jumlah}}</td>
                        <td>{{$permintaan->tgl_diperlukan}}</td>
                        <td>{{$permintaan->realisasi}}</td>
                        <td>{{$permintaan->keterangan}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer text-muted">
            <div class="row">
                <div class="col">
                    <p class="text-dark mb-0 pb-0 text-center">Unit Niaga</p>
                    <p class="text-dark mb-0 pb-0 text-center">Bagian Pembelian</p>
                    <p class="text-center mb-0">
                        <span><img class="img-ttd" src="{{ asset('assets/img/ttd_.jpg') }}" alt="ttd_"></span>
                    </p>
                    <p class="text-dark text-center">(SUDARMANTO)</p>
                </div>
                <div class="col">
                    <p class="text-dark mb-0 pb-0 text-center">Unit Niaga</p>
                    <p class="text-dark mb-0 pb-0 text-center">Bagian Pembelian</p>
                    <p class="text-center mb-0">
                        <span><img class="img-ttd" src="{{ asset('assets/img/ttd_.jpg') }}" alt="ttd_"></span>
                    </p>
                    <p class="text-dark text-center">(SUDARMANTO)</p>
                </div>
                <div class="col">
                    <p class="text-dark mb-0 pb-0 text-center">Unit Niaga</p>
                    <p class="text-dark mb-0 pb-0 text-center">Bagian Pembelian</p>
                    <p class="text-center mb-0">
                        <span><img class="img-ttd" src="{{ asset('assets/img/ttd_.jpg') }}" alt="ttd_"></span>
                    </p>
                    <p class="text-dark text-center">(SUDARMANTO)</p>
                </div>
                <div class="col">
                    <p class="text-dark mb-0 pb-0 text-center">Unit Niaga</p>
                    <p class="text-dark mb-0 pb-0 text-center">Bagian Pembelian</p>
                    <p class="text-center mb-0">
                        <span><img class="img-ttd" src="{{ asset('assets/img/ttd_.jpg') }}" alt="ttd_"></span>
                    </p>
                    <p class="text-dark text-center">(SUDARMANTO)</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col col-sm-1">
            <a href="{{URL::route('permintaan.index')}}" class="btn btn-warning btn-sm">Kembali</a>
        </div>
        @if ($permintaan->status_permintaan != 1)
        <div class="col col-sm-10">
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editPermintaan">Edit</button>
        </div>
        @else
        <div class="col col-sm-10">
            <span id="detail" class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Tidak boleh diedit" data-placement="right">
                <button class="btn btn-outline-primary btn-sm" style="pointer-events: none;" type="button" disabled>Edit</button>
            </span>
        </div>
        @endif
        @if ($permintaan->status_permintaan != 1)
        <div class="col">
            <form
                action="{{ URL::route('permintaan-pembelian.destroy',$permintaan->id) }}"
                method="POST" class="btn btn-sm p-0">
                @method('delete')
                @csrf
                <button class="btn btn-danger btn-sm">
                    Hapus
                </button>
            </form>
        </div>
        @else
        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Tidak boleh dihapus" data-placement="left">
            <button class="btn btn-outline-danger btn-sm" style="pointer-events: none;" type="button" disabled>Hapus</button>
        </span>
        @endif
    </div>
</div>
@endsection
@include('gudang.daftar-permintaan.edit-modal')
@push('tooltip')
    <script>
         $(function () {
             $('[data-toggle="tooltip"]').tooltip('show')
         })
    </script>
@endpush
