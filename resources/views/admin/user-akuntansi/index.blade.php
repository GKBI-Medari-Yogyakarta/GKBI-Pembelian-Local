@extends('admin.layouts.main')
@section('title','Admin Page')
@section('status-user','Admin Page')
@section('main')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Data User Akuntansi</h1>
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
                <i class="fas fa-table mr-1"></i>
                DataTable User akuntansi
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($user as $akuntansi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $akuntansi->name }}</td>
                                <td>{{ $akuntansi->email }}</td>
                                <td>
                                    <a href="{{ URL::route('admin-akuntansi.edit',$akuntansi->id) }}" class="btn btn-outline-warning">Edit</a>
                                    <form action="{{ URL::route('admin-akuntansi.destroy',$akuntansi->id) }}"
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
                                    <a href="edit-siswa.html" class="btn btn-outline-warning">Edit</a>
                                    <a href="#" class="btn btn-outline-danger">Hapus</a>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <a href="{{ URL::route('admin-akuntansi.create') }}" class="btn btn-primary">Tambah</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection