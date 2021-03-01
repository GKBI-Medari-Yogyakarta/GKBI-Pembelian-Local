@extends('gudang.layouts.main')
@section('title','Gudang Page')
@section('status-user','Gudang Page')
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
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                DataTable
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
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
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($barang_datang as $bd)
                            <tr>
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
                            </tr>
                            @empty
                            <tr>
                                <th rowspan="8"><h2>Daftar Barang Datang Kosong!!</h2></th>
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
