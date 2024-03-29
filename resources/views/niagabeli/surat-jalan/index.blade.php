@extends('niagabeli.layouts.main')
@section('title','Surat Jalan Page')
@section('status-user','Niagabeli Page')
@section('custom-style')
@section('main')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Surat Jalan</h1>
            @if(session('msg'))
                <div class="alert alert-success alert-dismissible" role="alert" style="z-index: 1">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('msg') }}
                </div>
            @endif
            @if(session('danger'))
                <div class="alert alert-success alert-dismissible" role="alert" style="z-index: 1">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('danger') }}
                </div>
            @endif
            @include('niagabeli.layouts.required')
            <div class="row">
                <div class="col">
                    <div class="card mb-4 mt-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Daftar Barang Sudah Dibeli
                        </div>
                        <div class="card-body p-2">
                            <div class="table-responsive">
                                <table class="table table-striped table-borderless table-sm" id="dataTable_BSD">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Pemesan</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                   @forelse ($barang_datang as $bd)
                                       <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $bd->nama }}</td>
                                            <td>{{ $bd->pemesan }}</td>
                                            <td>{{ $bd->nm_barang }}</td>
                                            <td>
                                                <form action="{{ URL::route('jalan.store',$bd->id) }}" method="POST" class="btn btn-sm p-0">
                                                    @csrf
                                                    <button class="btn btn-outline-info btn-sm">
                                                        Tambah Surat Jalan
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
                                <div class="mt-2 ml-2">
                                    {{--{{ $supplier->links() }}--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4 mt-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Surat Jalan
                        </div>
                        <div class="card-body p-2">
                            <div class="table-responsive">
                                <table class="table table-striped table-borderless table-sm" id="dataTable_SJ">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nomor Surat Jalan</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Arsip/Pemesan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                   @forelse ($surat_jalan as $sj)
                                       <tr @if (!isset($sj->tgl_) || !isset($sj->no_jalan))
                                        class="text-danger"
                                       @endif>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $sj->no_jalan }}</td>
                                            @if (isset($sj->tgl_))
                                            <td>{{\Carbon\Carbon::parse($sj->tgl_)->isoFormat('dddd, D MMM Y') }} </td>
                                            @else
                                            <td></td>
                                            @endif
                                            <td>{{ $sj->arsip }} <strong>{{ $sj->pemesan }}</strong></td>
                                            <td>
                                                <a href="{{ URL::route('jalan.edit',$sj->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>
                                                <form action="{{ URL::route('jalan.destroy',$sj->id) }}" method="POST" class="btn btn-sm p-0">
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
                                                <h3>Tidak ada surat jalan</h3>
                                            </td>
                                        </tr>
                                   @endforelse
                                    </tbody>
                                </table>
                                <div class="mt-2 ml-2">
                                    {{--{{ $supplier->links() }}--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <!-- Modal -->
@endsection
@push('tooltip')
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip('toggle')
    })
</script>
<script>
    $(function(){
        $('#dataTable_BSD').DataTable({
        });
      });
</script>
<script>
    $(function(){
        $('#dataTable_SJ').DataTable({
        });
      });
</script>
@endpush
