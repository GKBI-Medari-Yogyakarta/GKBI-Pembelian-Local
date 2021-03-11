@extends('gudang.layouts.main')
@section('title','Daftar Barang')
@section('status-user','Gudang Page')
@section('custom-style')
<style>
    svg.svg-inline--fa.fa-edit.fa-w-18 {
        font-size: large;
    }
</style>
@section('main')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Daftar Barang</h1>
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
                DataTable Daftar Barang
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama barang</th>
                                <th scope="col">Spesifikasi</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Kode barang</th>
                                <th scope="col">Jumlah barang</th>
                                <th scope="col">Stok Gudang</th>
                                <th scope="col">tambah barang ke</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nm_barang }}</td>
                                <td>{{ $item->spek_barang }}</td>
                                <td>{{ $item->ket_barang }}</td>
                                <td>{{ $item->kd_barang }}</td>
                                <td>{{ $item->jml_barang }}</td>
                                <td>{{ $item->barang_masuk }}</td>
                                <td>
                                    {{-- <a href="#" class="btn btn-sm btn-outline-info m-0 pl-1 pr-1" data-toggle="tooltip" data-placement="right" title="update stok">
                                        <i class="fas fa-edit"></i>
                                    </a> --}}
                                    <a href="#" class="btn btn-sm btn-success">unit</a>
                                    <form action="{{ URL::route('item.update',$item->id) }}" method="post" class="btn btn-sm">
                                        @csrf
                                        @method('put')
                                        <button class="btn btn-sm btn-success" type="submit">gudang</button>
                                    </form>
                                    {{-- <a href="{{ URL::route('item.update',$item->id) }}" class="btn btn-sm btn-success">gudang</a> --}}
                                </td>
                            </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@push('tooltip')
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endpush
