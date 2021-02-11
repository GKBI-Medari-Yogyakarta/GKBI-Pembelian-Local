@extends('admin.layouts.main')
@section('title','Admin Page Unit')
@section('status-user','Admin Page')
@section('main')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Data Unit</h1>
        @include('admin.message')
        <div class="card mb-4 mt-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                DataTable Unit
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama unit</th>
                                <th scope="col">Alias unit</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($unit as $units)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $units->nama }}</td>
                                <td>{{ $units->alias }}</td>
                                <td>
                                    <a href="{{ URL::route('admin-unit.edit',$units->id) }}" class="btn btn-outline-warning">Edit</a>
                                    <form action="{{ URL::route('admin-bagian.destroy',$units->id) }}"
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
                        <button data-toggle="modal" data-target="#tambahUnit" class="btn btn-outline-primary btn-sm">
                            Tambah
                        </button>
                        <button class="btn btn-sm mt-3">
                            {{ $unit->links() }}
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
