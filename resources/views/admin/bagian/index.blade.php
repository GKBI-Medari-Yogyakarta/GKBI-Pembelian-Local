@extends('admin.layouts.main')
@section('title','Admin Page Bagian')
@section('status-user','Admin Page')
@section('main')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Data Bagian</h1>
        @include('admin.message')
        <div class="card mb-4 mt-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                DataTable Bagian
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama bagian</th>
                                <th scope="col">No identitas</th>
                                <th scope="col">Masuk dalam unit</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bagian as $bagians)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $bagians->nm_bagian }}</td>
                                <td>{{ $bagians->no_identitas }}</td>
                                <td>{{ $bagians->nm_akt }}</td>
                                <td>
                                    <a href="{{ URL::route('admin-bagian.edit',$bagians->id) }}" class="btn btn-outline-warning">Edit</a>
                                    <form action="{{ URL::route('admin-bagian.destroy',$bagians->id) }}"
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
                    <div class="ml-2 mt-4 mb-4">
                        <button data-toggle="modal" data-target="#tambahBagian" class="btn btn-outline-primary btn-sm">
                            Tambah
                        </button>
                        <button class="btn btn-sm mt-3">
                            {{ $bagian->links() }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
{{-- Modal --}}
@include('admin.modal')
@endsection
