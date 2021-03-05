@extends('gudang.layouts.main')
@section('title','Gudang Page')
@section('status-user','Gudang Page')
@section('custom-style')
<style>
    .no-urut-kosong{
        color:red;
    }
</style>
@section('main')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Pembuatan NPM Qties</h1>
        @if(session('warning'))
            <div class="alert alert-success alert-dismissible" role="alert" style="z-index: 1">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('warning') }}
            </div>
        @endif
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
                DataTable User gudang
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="text-center align-middle">#</th>
                                <th scope="col" colspan="3" class="text-center">Nomor</th>
                                <th scope="col" rowspan="2" class="text-center align-middle">Bagian/Pemesan</th>
                                <th scope="col" rowspan="2" class="text-center align-middle">Aksi</th>
                            </tr>
                            <tr>
                                <th scope="col">Urut</th>
                                <th scope="col">Agenda Gudang</th>
                                <th scope="col">Agenda Pembelian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($qty as $qties)
                            <tr @if (!isset($bd->no_agenda_gudang) || !isset($bd->no_agenda_pembelian))
                                class="no-urut-kosong"
                            @endif>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $qties->no_urut }}</td>
                                <td>{{ $qties->nag }}</td>
                                <td>{{ $qties->nap }}</td>
                                <td>{{ $qties->bagian }}/<span class="badge">{{ $qties->nm_pemesan }}</span></td>
                                <td class="m-0 text-center">
                                    <a href="{{ URL::route('qty.edit',$qties->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ URL::route('test.edit',$qties->id) }}" class="btn btn-sm btn-primary">post</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="8" class="text-center">
                                    <h1>Kosong!!</h1>
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
