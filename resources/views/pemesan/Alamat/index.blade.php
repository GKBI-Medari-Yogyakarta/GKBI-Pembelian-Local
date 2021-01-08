@extends('pemesan.layouts.main')
@section('title','Pemesan Page')
@section('status-user','Pemesan Page')
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
        @include('pemesan.alamat.negara.required')
        <div class="card mb-4 mt-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                DataTable Negara/Provinsi/Kabupaten
            </div>
            <div class="card-body">
                <div class="row">
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
                                    <td>{{ $negara->name }}</td>
                                    <td>{{ $negara->email }}</td>
                                    <td>
                                        <a href="{{ URL::route('negara.edit') }}"
                                            class="btn btn-outline-warning">Edit</a>
                                        <form
                                            action="{{ URL::route('negara.destroy',$negara->id) }}"
                                            method="POST" class="btn">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-outline-danger">
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
                    <div class="col">
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
                                {{-- @forelse ($alamat as $gudang)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                <td>{{ $gudang->name }}</td>
                                <td>{{ $gudang->email }}</td>
                                <td>
                                    <a href="{{ URL::route('admin-gudang.edit',$gudang->id) }}"
                                        class="btn btn-outline-warning">Edit</a>
                                    <form
                                        action="{{ URL::route('admin-gudang.destroy',$gudang->id) }}"
                                        method="POST" class="btn">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-outline-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                                </tr>
                            @empty--}}
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>
                                        <a href="edit-siswa.html" class="btn btn-outline-warning btn-sm">Edit</a>
                                        <a href="#" class="btn btn-outline-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                {{-- @endforelse --}}
                            </tbody>
                        </table>
                    </div>
                    <div class="col">
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
                                {{-- @forelse ($alamat as $gudang)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                <td>{{ $gudang->name }}</td>
                                <td>{{ $gudang->email }}</td>
                                <td>
                                    <a href="{{ URL::route('admin-gudang.edit',$gudang->id) }}"
                                        class="btn btn-outline-warning">Edit</a>
                                    <form
                                        action="{{ URL::route('admin-gudang.destroy',$gudang->id) }}"
                                        method="POST" class="btn">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-outline-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                                </tr>
                            @empty--}}
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>
                                        <a href="edit-siswa.html" class="btn btn-outline-warning btn-sm">Edit</a>
                                        <a href="#" class="btn btn-outline-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                {{-- @endforelse --}}
                            </tbody>
                        </table>
                    </div>
                </div>
                <h4 class="mt-2 p-2 border-bottom border-info">Alamat berdasarkan daftar kabupaten yang ada</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Negara</th>
                                <th scope="col">Kode Negara</th>
                                <th scope="col">Provinsi</th>
                                <th scope="col">Kabupaten</th>
                                <th scope="col">aksi</th>
                            </tr>
                        </thead>
                        <tbody>
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
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Modal -->
@include('pemesan.alamat.modal')
@endsection
@push('tooltip')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip('toggle')
        })
    </script>
@endpush
