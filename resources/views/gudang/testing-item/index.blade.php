@extends('gudang.layouts.main')
@section('title','Gudang Page')
@section('status-user','Gudang Page')
@section('main')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Pengcekan barang</h1>
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
                                <th scope="col" rowspan="2">#</th>
                                <th scope="col" colspan="3" class="text-center">Nomor</th>
                                <th scope="col" colspan="4" class="text-center align-middle">Pengecekan</th>
                            </tr>
                            <tr>
                                <th scope="col">Agenda Gudang</th>
                                <th scope="col">Agenda Pembelian</th>
                                <th scope="col">Surat Jalan</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Detail</th>
                                <th scope="col">Aksi</th>
                                <th scope="col">Status</th>
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
                                <td>{{ \Carbon\Carbon::parse($item->tgl_)->isoformat('dddd, D MMM Y') }}</td>
                                <td class="text-center">
                                    @if ($item->cek_detail === '1')
                                    <h6>Ya</h6>
                                    @else
                                    <h6>Tidak</h6>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->cek_detail === '1')
                                    <a href="{{ URL::route('test.edit',$item->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    @else
                                    <button class="btn btn-sm btn-outline-danger" disabled>can't edit</button>
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($item->selesai))
                                    <p>Selesai <span class="badge badge-success">Y</span></p>
                                    @else
                                        @if (empty($item->no_test) || empty($item->tgl_))
                                        <p style="font-size: 75%" class="m-0 p-0">isi no. cek/tgl<br>terlebih dahulu</p>
                                        @else
                                        <form action="{{ url()->route('qty.store',$item->id) }}" method="post" class="btn btn-sm">
                                            @csrf
                                            <input type="submit" class="btn btn-sm btn-info" name="action" value="Y"/>
                                        </form>
                                        <form action="{{ url()->route('qty.store',$item->id) }}" method="post" class="btn btn-sm">
                                            @csrf
                                            <input type="submit" class="btn btn-sm btn-info" name="action" value="T"/>
                                        </form>
                                        @endif
                                    @endif
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
