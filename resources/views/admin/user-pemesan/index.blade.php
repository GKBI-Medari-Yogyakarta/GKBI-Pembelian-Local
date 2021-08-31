@extends('admin.layouts.main')
@section('title','Admin Page')
@section('status-user','Admin Page')
@section('main')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Data User Pemesan</h1>
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
                DataTable User Pemesan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($user as $pemesan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pemesan->name }}</td>
                                <td>{{ $pemesan->email }}</td>
                                <td>
                                    <a href="{{ URL::route('admin-pemesan.edit',$pemesan->id) }}" class="btn btn-outline-warning">Edit</a>
                                    <form action="{{ URL::route('admin-pemesan.destroy',$pemesan->id) }}"
                                        method="POST" class="btn">
                                        @method('delete')
                                        @csrf
                                        <button onclick="return confirm('are you sure?')" class="btn btn-outline-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">
                                    <h3>User gudang kosong!!</h3>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <a href="{{ URL::route('admin-pemesan.create') }}" class="btn btn-primary">Tambah</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@push('tooltip')
<script>
    $(function(){
        $('#dataTable_Pemesan').DataTable({
        });
    });
</script>
@endpush
