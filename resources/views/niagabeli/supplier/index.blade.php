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
                <div class="row">
                    <div class="col col-md-3">
                        <i class="fas fa-table mr-1"></i>
                        DataTable Alamat Supplier
                    </div>
                    <div class="col col-md-9">
                        <form action="{{ url()->current() }}">
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" class="form-control form-control-sm" name="searching" placeholder="cari nama/pemilik toko" value="{{ request('searching') }}">
                                </div>
                                <div class="col col-sm-1">
                                    <input type="number" class="form-control form-control-sm" name="limit" min="0" placeholder="limit" value="{{ request('limit') }}">
                                </div>
                                <div class="col col-sm-1">
                                    <button type="submit" class="btn btn-sm btn-info">cari</button>
                                </div>
                                <div class="col col-sm-1">
                                    <a href="{{ URL::route('supplier.index') }}" class="btn btn-sm btn-primary">clear</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body p-2">
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
                                <th class="text-center align-middle p-0" scope="col" rowspan="2">Aksi</th>
                            </tr>
                            <tr>
                                <th class="text-center p-0" scope="col">Provinsi</th>
                                <th class="text-center p-0" scope="col">Kabupaten</th>
                                <th class="text-center p-0" scope="col">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($supplier as $s)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $s->nama }}</td>
                                <td>{{ $s->attn }}</td>
                                <td>{{ $s->nm_prov }}</td>
                                <td>{{ $s->nm_kab }}</td>
                                <td>{{ $s->alamat }}</td>
                                <td>{{ $s->email }}</td>
                                <td style="width: 10%;">{{ $s->telp }}</td>
                                <td>{{ $s->fax }}</td>
                                <td>{{ $s->npwp }}</td>
                                <td>
                                    <a href="{{ URL::route('supplier.edit',$s->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>
                                    <form action="{{ URL::route('supplier.destroy',$s->id) }}" method="POST" class="btn btn-sm p-0">
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
                                <td colspan="11" class="text-center">
                                    <h3>Data Supplier masih kosong!!</h3>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="ml-2 mt-4 mb-4">
                        <button data-toggle="modal" data-target="#tambahSupplier" class="btn btn-outline-primary btn-sm">
                            Tambah Supplier
                        </button>
                    </div>
                    <div class="mt-2 ml-2">
                        {{ $supplier->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Modal -->
@include('niagabeli.supplier.modal')
@endsection
@push('tooltip')
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip('toggle')
    })
</script>
@endpush
