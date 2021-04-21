@extends('admin.layouts.main')
@section('title','Admin Page')
@section('status-user','Admin Page')
@section('user','Admin')
@section('main')
<main>
    <div class="container-fluid">
        <div class="card mb-4 mt-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                DataTable Exampledsd
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">No</th>
                                <th class="text-center align-middle">NISN</th>
                                <th class="text-center align-middle">Nama</th>
                                <th class="text-center align-middle">Jenis</th>
                                <th class="text-center align-middle">Kelas</th>
                                <th class="text-center align-middle">Penerima</th>
                                <th class="text-center align-middle">Penghasilan</th>
                                <th class="text-center align-middle">Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-center align-middle">No</th>
                                <th class="text-center align-middle">Siswa</th>
                                <th class="text-center align-middle">Siswa</th>
                                <th class="text-center align-middle">Kelamin</th>
                                <th class="text-center align-middle">Siswa</th>
                                <th class="text-center align-middle">KKS</th>
                                <th class="text-center align-middle">Orang Tua</th>
                                <th class="text-center align-middle">Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                                <td>61</td>
                                <td>
                                    <a href="edit-siswa.html" class="btn btn-outline-primary">Edit</a>
                                    <a href="#" class="btn btn-outline-danger">Hapus</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                                <td>61</td>
                                <td>
                                    <a href="edit-siswa.html" class="btn btn-outline-primary">Edit</a>
                                    <a href="#" class="btn btn-outline-danger">Hapus</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
