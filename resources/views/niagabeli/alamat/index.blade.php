@extends('niagabeli.layouts.main')
@section('title','Niagabeli Page')
@section('status-user','Niagabeli Page')
@section('main')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Alamat</h1>
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
                DataTable Negara/Provinsi/Kabupaten
            </div>
            <div class="card-body">
                <div class="row">
                    {{-- Negara --}}
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table table-striped table-sm border border-info">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Negara</th>
                                        <th scope="col">Kode Negara</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($n as $negara)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $negara->nama }}</td>
                                        <td>{{ $negara->kode }}</td>
                                        <td class="">
                                            <a href="{{ URL::route('negara.edit',$negara->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>
                                            <form action="{{ URL::route('negara.destroy',$negara->id) }}" method="POST" class="btn btn-sm p-0">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-outline-danger btn-sm">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>
                                            <a href="edit-siswa.html" class="btn btn-outline-warning btn-sm">Edit</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm">Hapus</a>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $n->links() }}
                        </div>
                    </div>
                    {{-- Provinsi --}}
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table table-striped table-sm border border-info">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Provinsi</th>
                                        <th scope="col">Alias</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($p as $prov)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $prov->nama }}</td>
                                        <td>{{ $prov->alias }}</td>
                                        <td class="float-right" style="min-width: 120px;">
                                            <a href="{{ URL::route('provinsi.edit',$prov->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>
                                            <form action="{{ URL::route('provinsi.destroy',$prov->id) }}" method="POST" class="btn btn-sm p-0">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-outline-danger btn-sm">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>
                                            <a href="edit-siswa.html" class="btn btn-outline-warning btn-sm">Edit</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm">Hapus</a>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- Kabupaten --}}
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table table-striped table-sm border border-info">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kabupaten</th>
                                        <th scope="col">Kota</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($k as $kabupaten)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kabupaten->nama }}</td>
                                        <td>{{ $kabupaten->kota }}</td>
                                        <td>
                                            <a href="{{ URL::route('kabupaten.edit',$kabupaten->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>
                                            <form action="{{ URL::route('kabupaten.destroy',$kabupaten->id) }}" method="POST" class="btn btn-sm p-0">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-outline-danger btn-sm">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>
                                            <a href="edit-siswa.html" class="btn btn-outline-warning btn-sm">Edit</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm">Hapus</a>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <h4 class="mt-2 p-2 border-bottom border-info">Alamat berdasarkan daftar kabupaten yang ada</h4>
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
                            @forelse ($alamat as $address)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $address->nm_kab }}</td>
                                <td>{{ $address->nm_prov }}</td>
                                <td>{{ $address->kode }}</td>
                                <td>{{ $address->nama }}</td>
                            </tr>
                            @empty
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
                            @endforelse
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
                        {{ $alamat->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Modal -->
@include('niagabeli.alamat.modal')
@endsection
@push('tooltip')
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip('toggle')
    })
</script>
@endpush
