@extends('gudang.layouts.main')
@section('title','Gudang Page')
@section('status-user','Gudang Page')
@section('main')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Pengecekan barang</h1>
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
                <div class="row">
                    <div class="col col-md-8">
                        <i class="fas fa-table mr-1"></i>
                        DataTable User gudang
                    </div>
                    <div class="col col-md-4">
                        <form action="{{ url()->current() }}">
                            <div class="form-row">
                                <div class="col col-sm-8">
                                    <input type="month" class="form-control form-control-sm" name="date" value="{{ request('date') }}">
                                </div>
                                <div class="col col-sm-4 text-right">
                                    <button type="submit" class="btn btn-sm btn-info">cari</button>
                                    <a href="{{ URL::route('test.index') }}" class="btn btn-sm btn-primary">clear</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered" id="dataTable_Testing" width="100%">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="text-center align-middle">#</th>
                                <th scope="col" colspan="4" class="text-center">Nomor</th>
                                <th scope="col" colspan="4" class="text-center align-middle">Pengecekan</th>
                            </tr>
                            <tr>
                                <th scope="col">Agenda Gudang</th>
                                <th scope="col">Agenda Pembelian</th>
                                <th scope="col">Surat Jalan</th>
                                <th scope="col">Pengecekan</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Detail</th>
                                <th scope="col">Aksi</th>
                                <th scope="col">Sesuai</th>
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
                                <td>{{ $item->no_test }}</td>
                                @if (empty($item->tgl_))
                                <td></td>
                                @else
                                <td>{{ \Carbon\Carbon::parse($item->tgl_)->isoformat('dddd, D MMM Y') }}</td>
                                @endif
                                <td class="text-center">
                                    @if ($item->cek_detail === '1')
                                    <h6>Ya</h6>
                                    @else
                                    <h6>Tidak</h6>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->cek_detail === '1' && $item->selesai === null)
                                    <a href="{{ URL::route('test.edit',$item->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    @else
                                    <button class="btn btn-sm btn-outline-danger" disabled>can't edit</button>
                                    @endif
                                </td>
                                <td class="m-0">
                                    @if (!empty($item->selesai))
                                    <p>Sesuai <span class="badge badge-success">Y</span></p>
                                    @elseIF($item->selesai === '0')
                                    <p>Sesuai <span class="badge badge-danger">T</span></p>
                                    @else
                                        @if (empty($item->no_test) || empty($item->tgl_))
                                        <p style="font-size: 75%" class="m-0 p-0">isi no. cek/tgl<br>terlebih dahulu</p>
                                        @else
                                        <form action="{{ url()->route('qty.store',$item->id) }}" method="post" class="btn btn-sm p-0 m-0">
                                            @csrf
                                            <input type="submit" class="btn btn-sm btn-info" name="action" value="Y"/>
                                        </form>
                                        <form action="{{ url()->route('qty.store',$item->id) }}" method="post" class="btn btn-sm p-0 m-0">
                                            @csrf
                                            <input type="submit" class="btn btn-sm btn-info" name="action" value="T"/>
                                        </form>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="9" class="text-center">
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
@push('tooltip')
<script>
    $(function(){
        $('#dataTable_Testing').DataTable({
        });
      });
</script>
@endpush
