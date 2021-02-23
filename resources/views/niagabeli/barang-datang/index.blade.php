@extends('niagabeli.layouts.main')
@section('title','Surat Jalan Page')
@section('status-user','Niagabeli Page')
@section('main')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Surat Jalan</h1>
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
                    DataTable Surat Jalan
                </div>
                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless table-sm">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nomor Surat Jalan</th>
                                <th scope="col">Tanggal Surat Jalan</th>
                                <th scope="col">Nomor Surat Ijin Masuk</th>
                                <th scope="col">Arsip</th>
                                <th scope="col">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                           {{-- @forelse ($surat_jalan as $sj)
                               <tr>
                                   <td>{{ $loop->iteration }}</td>
                                   <td>{{ $sj->no_jalan }}</td>
                                    <td> {{\Carbon\Carbon::parse($sj->tgl_)->isoFormat('dddd, D MMM Y') }} </td>
                                   <td>{{ $sj->arsip }}</td>
                                   <td>
                                       <a href="{{ URL::route('supplier.edit',$sj->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>
                                       <form action="{{ URL::route('supplier.destroy',$sj->id) }}" method="POST" class="btn btn-sm p-0">
                                           @method('delete')
                                           @csrf
                                           <button class="btn btn-outline-danger btn-sm">
                                               Hapus
                                           </button>
                                       </form>
                                   </td>
                               </tr>
                           @empty --}}
                                <tr>
                                    <td colspan="11" class="text-center">
                                        <h3>Data Supplier masih kosong!!</h3>
                                    </td>
                                </tr>
                           {{-- @endforelse --}}
                            </tbody>
                        </table>
                        <div class="ml-2 mt-4 mb-4">
                            <button data-toggle="modal" data-target="#suratJalan" class="btn btn-outline-primary btn-sm">
                                Tambah Surat Jalan
                            </button>
                        </div>
                        <div class="mt-2 ml-2">
{{--                            {{ $supplier->links() }}--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Modal -->
    @include('niagabeli.surat-jalan.modal')
@endsection
@push('tooltip')
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip('toggle')
        })
    </script>
@endpush
