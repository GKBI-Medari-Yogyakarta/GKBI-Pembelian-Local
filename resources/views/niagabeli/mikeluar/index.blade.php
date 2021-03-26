@extends('niagabeli.layouts.main')
@section('title','Mi Keluar')
@section('status-user','Niagabeli Page')
@section('main')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Mi Keluar</h1>
            @if(session('msg'))
                <div class="alert alert-success alert-dismissible" role="alert" style="z-index: 1">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('msg') }}
                </div>
            @endif
            @if(session('warning'))
                <div class="alert alert-success alert-dismissible" role="alert" style="z-index: 1">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('warning') }}
                </div>
            @endif
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col col-md-8">
                            <i class="fas fa-table mr-1"></i>
                            Datatable
                        </div>
                        <div class="col col-md-4">
                            <form action="{{ url()->current() }}">
                                <div class="form-row">
                                    <div class="col col-sm-8">
                                        <input type="month" class="form-control form-control-sm" name="date" value="{{ request('date') }}">
                                    </div>
                                    <div class="col col-sm-4 text-right">
                                        <button type="submit" class="btn btn-sm btn-info">cari</button>
                                        <a href="{{ URL::route('mikeluar.index') }}" class="btn btn-sm btn-primary">clear</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless table-sm" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No. Test</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">No. MI Ijin Keluar</th>
                                <th scope="col">Status deputi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($mikeluar as $miout)
                                <tr @if ($miout->status_deputi === null) class="text-danger" @endif>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $miout->no_test }}</td>
                                    <td>{{ \Carbon\Carbon::parse($miout->tgl_)->isoformat('dddd, D MMM Y') }}</td>
                                    <td>{{ $miout->no_mikeluar }}</td>
                                    <td @if ($miout->status_deputi === '0') class="pl-5" @endif>
                                        @if ($miout->no_mikeluar === null)
                                        <button class="btn btn-sm btn-outline-warning">isi no MI Ijin</button>
                                        @else
                                            @if ($miout->status_deputi === null)
                                            <form action="{{ URL::route('mikeluar.store',$miout->id) }}" method="post" class="btn btn-sm p-0 m-0">
                                                @csrf
                                                @method('put')
                                                <input type="submit" class="btn btn-sm btn-info" name="action" value="Ya">
                                            </form>
                                            <form action="{{ URL::route('mikeluar.store',$miout->id) }}" method="post" class="btn btn-sm p-0 m-0">
                                                @csrf
                                                @method('put')
                                                <input type="submit" class="btn btn-sm btn-info" name="action" value="Tidak">
                                            </form>
                                            @else
                                                @if ($miout->status_deputi === '1')
                                                <button class="btn btn-sm btn-success">Ya</button>
                                                @elseif($miout->status_deputi === '0')
                                                <button class="btn btn-sm btn-danger">Tidak</button>
                                                @else
                                                <p>status belum diupdate</p>
                                                @endif
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if ($miout->status_deputi === null)
                                        <a href="{{ URL::route('mikeluar.edit',$miout->id) }}" class="btn btn-info btn-sm">Edit</a>
                                        @else
                                        <button disabled class="btn btn-outline-danger btn-sm">Can't Edit</button>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="11" class="text-center">
                                        <h3>Tidak ada surat ijin masuk</h3>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="mt-2 ml-2">
                            {{--{{ $supplier->links() }}--}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <!-- Modal -->
@endsection
@push('tooltip')
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip('toggle')
    })
</script>
@endpush
