@extends('niagabeli.layouts.main')
@section('title','Niagabeli Page')
@section('status-user','Niagabeli Page')
@section('custom-style')
<style>
    .h-nomor {
        width: 10%;
        height: 10%;
    }

    .h-t {
        height: 10%;
    }

    .w-titik {
        width: 1%;
    }

    table.nav-right.table.table-borderless.table-sm.mb-0 {
        margin-top: 27%;
    }

    .img-ttd {
        width: 200px;
    }

    td.text-center.align-middle.ttd {
        width: 10px;
        margin: 0px;
    }
    .status{
        width: max-content;
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
    @include('niagabeli.layouts.required')
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
                                <td colspan="3" class="h-t pl-0">{{ $transaction->no_niaga }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="h-nomor pl-0">Tanggal</th>
                                <td class="h-t w-titik"><strong>:</strong></td>
                                @empty($transaction->tgl_status == false)
                                    <td colspan="3" class="h-t pl-0">{{\Carbon\Carbon::parse($transaction->tgl_status)->isoFormat('D MMM Y') }}</td>
                                @endempty
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
                                <td colspan="3" class="h-t pl-0">{{$transaction->permintaan->pemesan}}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="h-nomor pl-5">Unit/Bagian</th>
                                <td class="h-t text-right"><strong>:</strong></td>
                                <td colspan="3" class="h-t pl-0">{{$transaction->permintaan->bagian->nama}}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="h-nomor pl-5">Nomor</th>
                                <td class="h-t text-right"><strong>:</strong></td>
                                <td colspan="3" class="h-t pl-0">{{$transaction->permintaan->no_pemesan}}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="h-nomor pl-5">Tanggal</th>
                                <td class="h-t text-right"><strong>:</strong></td>
                                <td colspan="3" class="h-t pl-0"> {{\Carbon\Carbon::parse($transaction->permintaan->tgl_pesanan)->isoFormat('D MMM Y') }} </td>
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
                        <th scope="row">{{$transaction->permintaan->id}}</th>
                        <td>{{$transaction->permintaan->nm_barang}} / {{$transaction->permintaan->spesifikasi}}</td>
                        <td>{{$transaction->permintaan->unit_stok}}</td>
                        <td>{{$transaction->permintaan->gudang_stok}}</td>
                        <td>{{$transaction->permintaan->jumlah}}</td>
                        <td> {{\Carbon\Carbon::parse($transaction->permintaan->tgl_diperlukan)->isoFormat('dddd, D MMM Y') }} </td>
                        <td>{{$transaction->permintaan->realisasi}}</td>
                        <td>{{$transaction->permintaan->keterangan}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer text-muted">
            <table class="table table-borderless table-sm">
                <thead>
                    <tr>
                        <th scope="col" class="text-center align-middle ttd p-0 m-0">Unit Niaga</th>
                        <th scope="col" class="text-center align-middle ttd p-0 m-0" rowspan="2">Direktur</th>
                        <th scope="col" class="text-center align-middle ttd p-0 m-0" rowspan="2">Ka. Unit</th>
                        <th scope="col" class="text-center align-middle ttd p-0 m-0" rowspan="2">Ka. Bagian/Pemesan</th>
                    </tr>
                    <tr>
                        <th scope="col" class="text-center">Bagian Pembelian</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center align-middle ttd">
                            @if ($transaction->permintaan->status_niaga_pembelian != '1' && $transaction->status_niaga != 'acc')
                            <h4>Belum di acc</h4>
                                @if (!empty($transaction->no_niaga))
                                <button data-toggle="modal" data-target="#accPermintaan" class="btn btn-outline-primary btn-sm">
                                    Acc sekarang.?
                                </button>
                                @else
                                <button disabled class="btn btn-primary btn-sm">
                                    isi nomor pembelian terlebih dahulu
                                </button>
                                @endif
                            @else
                            <span><img class="img-ttd" src="{{ asset('assets/img/ttd_.jpg') }}" alt="ttd_"></span>
                            @endif
                        </td>
                        <td class="text-center align-middle ttd">
                            <span><img class="img-ttd" src="{{ asset('assets/img/ttd_.jpg') }}" alt="ttd_"></span>
                        </td>
                        <td class="text-center align-middle ttd">
                            <span><img class="img-ttd" src="{{ asset('assets/img/ttd_.jpg') }}" alt="ttd_"></span>
                        </td>
                        <td class="text-center align-middle ttd">
                            <span><img class="img-ttd" src="{{ asset('assets/img/ttd_.jpg') }}" alt="ttd_"></span>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td class="text-center">SUDARMANTO</td>
                        <td class="text-center">SUDARMANTO</td>
                        <td class="text-center">SUDARMANTO</td>
                        <td class="text-center">SUDARMANTO</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col col-sm-1">
            <a href="{{URL::route('transaction.index')}}" class="btn btn-warning btn-sm">Kembali</a>
        </div>
        <div class="col col-sm-9">
            @if ($status !== true)
            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Tidak dapat diedit, status belum/tidak di acc" data-placement="right">
                <button class="btn btn-outline-danger btn-sm" style="pointer-events: none;" type="button" disabled>Edit</button>
            </span>
            @else
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updatePembelian">Edit</button>
            @endif
        </div>
        <div class="col">
            @if ($transaction->status_beli !== '1')
            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editPermintaan">Proses Pembelian</a>
            @else
            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Tidak dapat diproses, status belum/tidak di acc" data-placement="left">
                <button class="btn btn-outline-danger btn-sm" style="pointer-events: none;" type="button" disabled>Proses Pembelian</button>
            </span>
            @endif
        </div>
    </div>
</div>
@endsection
@include('niagabeli.pembelian.update-modal')
@include('niagabeli.pembelian.acc-modal')
@push('tooltip')
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip({
            delay: {show:0,hide:2000}
        });
    })
</script>
@endpush
