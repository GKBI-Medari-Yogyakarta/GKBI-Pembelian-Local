@extends('pemesan.layouts.main')
@section('title','Pemesan Page')
@section('status-user','Pemesan Page')
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
            <table class="table table-bordered">
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
                        <td>{{$permintaan->gudang_stok}}</td>
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
    <a href="{{URL::route('permintaan.index')}}" class="btn btn-outline-primary btn-sm">Go somewhere {{$permintaan->id}}</a>
    <button class="btn btn-outline-info" data-toggle="modal" data-target="#editPermintaan">Edit</button>
</div>
@endsection
@include('pemesan.permintaan.edit-modal')