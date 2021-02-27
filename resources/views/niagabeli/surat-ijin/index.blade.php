@extends('niagabeli.layouts.main')
@section('title','Surat Jalan Page')
@section('status-user','Niagabeli Page')
@section('main')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Surat Ijin Masuk</h1>
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
                    <i class="fas fa-table mr-1"></i>
                    Datatable
                </div>
                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless table-sm">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No. Ijin Masuk</th>
                                <th scope="col">Tanggal/Jam</th>
                                <th scope="col">No. Surat Jalan</th>
                                <th scope="col">Arsip</th>
                                <th scope="col">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($surat_in as $sim)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sim->no_ijin }}</td>
                                    @if (isset($sim->tgl_))
                                    <td>{{\Carbon\Carbon::parse($sim->tgl_)->format('d M Y, H:i A') }} </td>
                                    @else
                                    <td></td>
                                    @endif
                                    <td>{{ $sim->nj }}</td>
                                    <td>{{ $sim->arsip }}</td>
                                    <td>
                                        <a href="{{ URL::route('sim.edit',$sim->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>
                                        {{-- <form action="{{ URL::route('jalan.destroy',$sim->id) }}" method="POST" class="btn btn-sm p-0">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-outline-danger btn-sm">
                                                Hapus
                                            </button>
                                        </form> --}}
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
