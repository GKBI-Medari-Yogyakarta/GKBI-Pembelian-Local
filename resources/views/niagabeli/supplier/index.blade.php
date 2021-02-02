@extends('niagabeli.layouts.main')
@section('title','Niagabeli Page')
@section('status-user','Niagabeli Page')
@section('main')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Alamat Supplier</h1>
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
                DataTable Alamat Supplier
            </div>
            <div class="card-body">
                <h4 class="mt-2 p-2 border-bottom border-info">Alamat Supplier</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-sm">
                        <thead>
                            <tr>
                                <th class="text-center align-middle p-0" scope="col" rowspan="2">#</th>
                                <th class="text-center align-middle p-0" scope="col" rowspan="2">Nama</th>
                                <th class="text-center align-middle p-0" scope="col" rowspan="2">Attn</th>
                                <th class="text-center align-middle p-0" scope="col" colspan="3">Alamat</th>
                                <th class="text-center align-middle p-0" scope="col" rowspan="2">Email</th>
                                <th class="text-center align-middle p-0" scope="col" rowspan="2">No. Telp.</th>
                                <th class="text-center align-middle p-0" scope="col" rowspan="2">FAX</th>
                                <th class="text-center align-middle p-0" scope="col" rowspan="2">NPWP</th>
                            </tr>
                            <tr>
                                <th class="text-center p-0" scope="col">Provinsi</th>
                                <th class="text-center p-0" scope="col">Kabupaten</th>
                                <th class="text-center p-0" scope="col">Detail</th>
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
                        <button data-toggle="modal" data-target="#tambahNegara" class="btn btn-outline-primary btn-sm">
                            Negara
                        </button>
                        <button data-toggle="modal" data-target="#tambahProv" class="btn btn-outline-primary btn-sm">
                            Provinsi
                        </button>
                        <button data-toggle="modal" data-target="#tambahKab" class="btn btn-outline-primary btn-sm">
                            Kabupaten
                        </button>
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
{{-- @include('niagabeli.alamat.modal') --}}
@endsection
@push('tooltip')
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip('toggle')
    })
</script>
@endpush
