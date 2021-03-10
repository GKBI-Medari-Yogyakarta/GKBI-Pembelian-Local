@extends('niagabeli.layouts.main')
@section('title','Surat ijin MI Keluar')
@section('status-user','Niagabeli Page')
@section('main')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Surat Ijin MI Keluar</h1>
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
                    <i class="fas fa-table mr-1"></i>
                    Datatable
                </div>
                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless table-sm">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No. MI Keluar</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($ijin_keluar as $ik)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ik->no_mikeluar }}</td>
                                    <td>{{ $ik->ket_ }}</td>
                                    <td>{{ \Carbon\Carbon::parse($ik->tgl_)->isoformat('dddd, D MMM Y') }}</td>
                                    <td>
                                        <a href="{{ URL::route('ijin-keluar.edit',$ik->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="11" class="text-center">
                                        <h3>Tidak ada surat MI ijin masuk</h3>
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
