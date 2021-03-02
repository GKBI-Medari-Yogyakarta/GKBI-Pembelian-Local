@extends('gudang.layouts.main')
@section('title','Gudang Page')
@section('status-user','Gudang Page')
@section('main')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Pengcekan barang</h1>
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
                                <th scope="col">#</th>
                                <th scope="col">No. Agenda Gudang</th>
                                <th scope="col">No. Agenda Pembelian</th>
                                <th scope="col">No. Surat Jalan</th>
                                <th scope="col">Tanggal Surat Jalan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr @if (!isset($item->no_agenda_gudang) || !isset($item->no_agenda_pembelian))
                                class="no-agenda-kosong"
                            @endif>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->nag }}</td>
                                <td>{{ $item->nap }}</td>
                                <td>{{ $item->nj }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->isoformat('dddd, D MMM Y') }}</td>
                                <td>{{ $item->cek_detail }}</td>
                                <td>
                                    @if ($item->cek_detail === '1')
                                    <a href="{{ URL::route('test.edit',$item->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    @else
                                    <button class="btn btn-sm btn-outline-danger" disabled>can't edit</button>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="7" class="text-center">
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
