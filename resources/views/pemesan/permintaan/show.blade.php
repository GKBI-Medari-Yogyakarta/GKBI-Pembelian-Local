@extends('pemesan.layouts.main')
@section('title','Pemesan Page')
@section('status-user','Pemesan Page')
@section('main')
<div class="container-fluid">
    <div class="card mb-4 mt-4">
        <div class="card-header">
            <div class="row border border-primary p-0">
                <div class="col border border-warning p-0 m-0">
                    <h5 class="m-0"><strong>PC. GKBI</strong></h5>
                    <p class="m-0">Medari, Sleaman, Yogyakarta</p>
                    <p class="mt-2 mb-0">Unit NIAGA</p>
                    <p class="mb-0">Bagian Pembelian</p>
                    {{-- <table class="table table-borderless"> --}}
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row" class="h-nomor pl-0">Nomor</th>
                                <td><strong>:</strong></td>
                                <td colspan="3" class="h-nomor pl-0">Mark</td>
                            </tr>
                            <tr>
                                <th scope="row" class="pl-0">Tanggal</th>
                                <td><strong>:</strong></td>
                                <td colspan="3">Jacob</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col border border-success p-0 m-0">tes</div>
                <div class="col border border-danger p-0 m-0">tes</div>
            </div>

        </div>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere {{$permintaan->id}}</a>
        </div>
        <div class="card-footer text-muted">
            2 days ago
        </div>
    </div>
</div>
@endsection
