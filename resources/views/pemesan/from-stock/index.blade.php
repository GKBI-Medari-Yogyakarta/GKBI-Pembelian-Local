@extends('pemesan.layouts.main')
@section('title','Tambah barang Page')
@section('status-user','Pemesan Page')
@section('main')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Permintaan</h1>
        @if(session('msg'))
            <div class="alert alert-success alert-dismissible" role="alert" style="z-index: 1">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('msg') }}
            </div>
        @endif
        @include('pemesan.layouts.required')
        <div class="card mb-4 mt-4">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <i class="fas fa-table mr-1"></i>
                        DataTable Permintaan
                    </div>
                    <div class="col text-right">
                        <form action="{{ url()->current() }}">
                            <div class="form-row">
                                <div class="col col-sm-6">
                                    <input type="text" class="form-control form-control-sm" name="keyword" placeholder="cari nama barang atau kode barang" value="{{ request('keyword') }}">
                                </div>
                                <div class="col col-sm-5">
                                    <input type="number" class="form-control form-control-sm" name="limit" placeholder="limit" value="{{ request('limit') }}">
                                </div>
                                <div class="col col-sm-1">
                                    <button type="submit" class="btn btn-sm btn-primary">cari</button>
                                </div>
                            </div>
                        </form>
                        {{-- <form action="{{ url()->current() }}">
                            <div class="col-md-10">
                                <input type="text" name="keyword" class="form-control" placeholder="Search name or email..." value="{{ request('keyword') }}">
                                <input type="number" name="limit" class="form-control" placeholder="limit pagination" value="{{ request('limit') }}">
                            </div>
                            <div class="col-md-2 text-right">
                                <button type="submit" class="btn btn-primary">
                                    Search
                                </button>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama barang</th>
                                <th scope="col">Spesifikasi</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Kode barang</th>
                                <th scope="col">Jumlah barang</th>
                                <th scope="col">Barang masuk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($item as $items)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $items->nm_barang }}</td>
                                <td class="align-middle">{{ $items->spek_barang }}</td>
                                <td class="align-middle">{{ $items->ket_barang }}</td>
                                <td class="align-middle">{{ $items->kd_barang }}</td>
                                <td class="align-middle">{{ $items->jml_barang }}</td>
                                <td class="align-middle">{{ $items->barang_masuk }}</td>
                            </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                    <div class="ml-2 mt-4 mb-4">
                        <button data-toggle="modal" data-target="#tambahPermintaan" class="btn btn-outline-primary btn-sm">
                            Tambah daftar permintaan
                        </button>
                    </div>
                    <div class="mt-2 ml-2">
                        {{ $item->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Modal -->
{{-- @include('pemesan.permintaan.modal') --}}
@endsection
@push('tooltip')
    <script>
         $(function () {
             $('[data-toggle="tooltip"]').tooltip('show')
         })
    </script>
@endpush
