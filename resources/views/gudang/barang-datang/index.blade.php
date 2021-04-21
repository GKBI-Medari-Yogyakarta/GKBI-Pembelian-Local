@extends('gudang.layouts.main')
@section('title','Gudang Page')
@section('status-user','Gudang Page')
@section('custom-style')
<style>
    .no-agenda-kosong{
        color:red;
    }
</style>
@section('main')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Barang Datang</h1>
        @if(session('msg'))
            <div class="alert alert-success alert-dismissible" role="alert" style="z-index: 1">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('msg') }}
            </div>
        @endif
        <div class="card mb-4 mt-4">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col col-md-8">
                        <i class="fas fa-table mr-1"></i>
                        DataTable barang datang
                    </div>
                    <div class="col col-md-4">
                        <form action="{{ url()->current() }}">
                            <div class="form-row">
                                <div class="col col-sm-8">
                                    <input type="month" class="form-control form-control-sm" name="date" value="{{ request('date') }}">
                                </div>
                                <div class="col col-sm-4 text-right">
                                    <button type="submit" class="btn btn-sm btn-info">cari</button>
                                    <a href="{{ URL::route('bd.index') }}" class="btn btn-sm btn-primary">clear</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No. Agenda Gudang</th>
                                <th scope="col">No. Agenda Pembelian</th>
                                <th scope="col">No. Surat Jalan</th>
                                <th scope="col">No. Rencana Pembelian</th>
                                <th scope="col">Tanggal Surat Jalan</th>
                                <th scope="col">Arsip</th>
                                <th scope="col">Aksi</th>
                                <th scope="col">Cek detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($barang_datang as $bd)
                                @if (empty($bd->mikeluar_id))
                                    <tr @if (!isset($bd->no_agenda_gudang) || !isset($bd->no_agenda_pembelian)) class="no-agenda-kosong" @endif>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $bd->no_agenda_gudang }}</td>
                                        <td>{{ $bd->no_agenda_pembelian }}</td>
                                        <td>{{ $bd->nj }}</td>
                                        <td>{{ $bd->no_rencana }}</td>
                                        <td>{{ \Carbon\Carbon::parse($bd->tanggal)->isoformat('dddd, D MMM Y') }}</td>
                                        <td>{{ $bd->arsip }}</td>
                                        <td>
                                            <a href="{{ URL::route('bd.edit',$bd->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        </td>
                                        <td>
                                            @if (empty($bd->no_agenda_pembelian)||empty($bd->no_agenda_gudang))
                                            <p class="text-right">isi nomor agenda<br>terlebih dahulu</p>
                                            @else
                                            <form action="{{ URL::route('test.store',$bd->id) }}" method="POST" class="btn btn-sm p-0 m-0">
                                                @csrf
                                                <input type="submit" name="action" class="btn btn-sm btn-primary" value="Y">
                                            </form>
                                            <form action="{{ URL::route('test.store',$bd->id) }}" method="POST" class="btn btn-sm p-0 m-0">
                                                @csrf
                                                <input type="submit" name="action" class="btn btn-sm btn-primary" value="T">
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @empty
                            <tr >
                                <th colspan="8" class="text-center">
                                    <h2>Daftar Barang Datang Kosong!!</h2>
                                </th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card mb-4 mt-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                DataTable barang yang direfund untuk dicek kembali!!
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No. Agenda Gudang</th>
                                <th scope="col">No. Agenda Pembelian</th>
                                <th scope="col">No. Surat Jalan</th>
                                <th scope="col">No. Rencana Pembelian</th>
                                <th scope="col">Tanggal Surat Jalan</th>
                                <th scope="col">Arsip</th>
                                <th scope="col">Aksi</th>
                                <th scope="col">Cek detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($barang_datang as $bd)
                                @if (!empty($bd->mikeluar_id))
                                    <tr @if (!isset($bd->no_agenda_gudang) || !isset($bd->no_agenda_pembelian)) class="no-agenda-kosong" @endif>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $bd->no_agenda_gudang }}</td>
                                        <td>{{ $bd->no_agenda_pembelian }}</td>
                                        <td>{{ $bd->nj }}</td>
                                        <td>{{ $bd->no_rencana }}</td>
                                        <td>{{ \Carbon\Carbon::parse($bd->tanggal)->isoformat('dddd, D MMM Y') }}</td>
                                        <td>{{ $bd->arsip }}</td>
                                        <td>
                                            <a href="{{ URL::route('bd.edit',$bd->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        </td>
                                        <td>
                                            @if (empty($bd->no_agenda_pembelian)||empty($bd->no_agenda_gudang))
                                            <p class="text-right">isi nomor agenda<br>terlebih dahulu</p>
                                            @else
                                            <form action="{{ URL::route('test.store',$bd->id) }}" method="POST" class="btn btn-sm p-0 m-0">
                                                @csrf
                                                <input type="submit" name="action" class="btn btn-sm btn-primary" value="Y">
                                            </form>
                                            <form action="{{ URL::route('test.store',$bd->id) }}" method="POST" class="btn btn-sm p-0 m-0">
                                                @csrf
                                                <input type="submit" name="action" class="btn btn-sm btn-primary" value="T">
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @empty
                            <tr >
                                <th colspan="8" class="text-center">
                                    <h2>Daftar Barang Datang Kosong!!</h2>
                                </th>
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
