@extends('admin.layouts.main')
@section('title','Admin Page')
@section('status-user','Admin Page')
@section('main')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit User Gudang</h1>
        <div class="card mb-4 mt-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Form edit data user {{ $user->name }}
            </div>
            <div class="card-body">
                <form action="{{ URL::route('admin-gudang.update',$user->id) }}" method="POST">
                    @method('put')
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}">
                        @error('name')
                        <div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email Dummy</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{ $user->email }}">
                        @error('email')
                        <div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        <p><strong>biarkan kosong jika tidak ingin mengganti password!!</strong></p>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Simpan</button>
                    <a href="{{ URL::route('admin-gudang.index') }}" class="btn btn-outline-primary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
