@extends('pemesan.layouts.main')
@section('title','Pemesan Page')
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
        {{-- @include('pemesan.alamat.required') --}}
        <div class="card mb-4 mt-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                DataTable Permintaan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kabupaten</th>
                                <th scope="col">Provinsi</th>
                                <th scope="col">Kode Negara</th>
                                <th scope="col">Negara</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @forelse ($alamat as $address)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $address->nm_kab }}</td>
                                <td>{{ $address->nm_prov }}</td>
                                <td>{{ $address->kode }}</td>
                                <td>{{ $address->nama }}</td>
                            </tr>
                            @empty --}}
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>
                                    <a href="edit-siswa.html" class="btn btn-outline-warning">Edit</a>
                                    <a href="#" class="btn btn-outline-danger">Hapus</a>
                                </td>
                            </tr>
                            {{-- @endforelse --}}
                        </tbody>
                    </table>
                    <div class="ml-2 mt-4 mb-4">
                        {{-- <button data-toggle="modal" data-target="#tambahNegara" class="btn btn-outline-primary btn-sm">
                            Negara
                        </button> --}}
                        <button class="btn btn-outline-primary btn-sm">Tambah</button>
                    </div>
                    <div class="mt-2 ml-2">
                        {{-- {{ $alamat->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Modal -->
{{-- @include('pemesan.alamat.modal') --}}
@endsection
@push('tooltip')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip('toggle')
        })
    </script>
@endpush
