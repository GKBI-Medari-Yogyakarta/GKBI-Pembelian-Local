@extends('niagabeli.layouts.main')
@section('title','Niagabeli Page')
@section('status-user','Niagabeli Page')
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
        @include('niagabeli.layouts.required')
        <div class="card mb-4 mt-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                DataTable Negara/Provinsi/Kabupaten
            </div>
            <div class="card-body pt-2">
                {{-- <div class="row">
                    <div class="col mb-1">
                        <form action="{{ url()->current() }}">
                            <div class="form-row">
                                <div class="col col-sm-4">
                                    <input type="text" class="form-control form-control-sm" name="keyword" placeholder="cari negara" value="{{ request('keyword') }}">
                                </div>
                                <div class="col col-sm-4">
                                    <input type="number" class="form-control form-control-sm" name="limit" placeholder="limit" value="{{ request('limit') }}">
                                </div>
                                <div class="col col-sm-2">
                                    <button type="submit" class="btn btn-sm btn-info">cari</button>
                                </div>
                                <div class="col col-sm-2">
                                    <a href="{{ URL::route('permintaan-pembelian.index') }}" class="btn btn-sm btn-primary">clear</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col mb-1">
                        <form action="{{ url()->current() }}">
                            <div class="form-row">
                                <div class="col col-sm-4">
                                    <input type="text" class="form-control form-control-sm" name="keyword" placeholder="cari negara" value="{{ request('keyword') }}">
                                </div>
                                <div class="col col-sm-4">
                                    <input type="number" class="form-control form-control-sm" name="limit" placeholder="limit" value="{{ request('limit') }}">
                                </div>
                                <div class="col col-sm-2">
                                    <button type="submit" class="btn btn-sm btn-info">cari</button>
                                </div>
                                <div class="col col-sm-2">
                                    <a href="{{ URL::route('permintaan-pembelian.index') }}" class="btn btn-sm btn-primary">clear</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col mb-1">
                        <form action="{{ url()->current() }}">
                            <div class="form-row">
                                <div class="col col-sm-4">
                                    <input type="text" class="form-control form-control-sm" name="keyword" placeholder="cari negara" value="{{ request('keyword') }}">
                                </div>
                                <div class="col col-sm-4">
                                    <input type="number" class="form-control form-control-sm" name="limit" placeholder="limit" value="{{ request('limit') }}">
                                </div>
                                <div class="col col-sm-2">
                                    <button type="submit" class="btn btn-sm btn-info">cari</button>
                                </div>
                                <div class="col col-sm-2">
                                    <a href="{{ URL::route('permintaan-pembelian.index') }}" class="btn btn-sm btn-primary">clear</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> --}}
                <div class="row">
                    {{-- Negara --}}
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table table-striped table-sm border border-info" id="dataTable_negara" width="100%">
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
                                        <td>{{ $negara->nama }}</td>
                                        <td>{{ $negara->kode }}</td>
                                        <td class="p-0">
                                            <a href="{{ URL::route('negara.edit',$negara->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>
                                            <form action="{{ URL::route('negara.destroy',$negara->id) }}" method="POST" class="btn btn-sm p-0">
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
                                        <td colspan="4"><strong>Daftar negara kosong!!</strong></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $n->links() }}
                        </div>
                    </div>
                    {{-- Provinsi --}}
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table table-striped table-sm border border-info" id="dataTable_prov" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Provinsi</th>
                                        <th scope="col">Alias</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($p as $prov)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $prov->nama }}</td>
                                        <td>{{ $prov->alias }}</td>
                                        <td class="float-right" style="min-width: 120px;">
                                            <a href="{{ URL::route('provinsi.edit',$prov->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>
                                            <form action="{{ URL::route('provinsi.destroy',$prov->id) }}" method="POST" class="btn btn-sm p-0">
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
                                        <td colspan="4"><strong>Daftar negara kosong!!</strong></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $p->links() }}
                        </div>
                    </div>
                    {{-- Kabupaten --}}
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table table-striped table-sm border border-info" id="dataTable_kab" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kabupaten</th>
                                        <th scope="col">Kota</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($k as $kabupaten)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kabupaten->nama }}</td>
                                        <td>{{ $kabupaten->kota }}</td>
                                        <td class="p-1">
                                            <a href="{{ URL::route('kabupaten.edit',$kabupaten->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>
                                            <form action="{{ URL::route('kabupaten.destroy',$kabupaten->id) }}" method="POST" class="btn btn-sm p-0">
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
                                        <td colspan="4"><strong>Daftar negara kosong!!</strong></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $k->links() }}
                        </div>
                    </div>
                </div>
                <h4 class="mt-2 p-2 border-bottom border-info">Alamat berdasarkan daftar kabupaten yang ada</h4>
                {{-- <form action="{{ url()->current() }}">
                    <div class="form-row">
                        <div class="col col-sm-4">
                            <input type="text" class="form-control form-control-sm" name="alamat" placeholder="cari alamat" value="{{ request('alamat') }}">
                        </div>
                        <div class="col col-sm-4">
                            <input type="number" class="form-control form-control-sm" name="limit" placeholder="limit" value="{{ request('limit') }}">
                        </div>
                        <div class="col col-sm-2">
                            <button type="submit" class="btn btn-sm btn-info">cari</button>
                        </div>
                        <div class="col col-sm-2">
                            <a href="{{ URL::route('permintaan-pembelian.index') }}" class="btn btn-sm btn-primary">clear</a>
                        </div>
                    </div>
                </form> --}}
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable_alamat" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kabupaten</th>
                                <th scope="col">Provinsi</th>
                                <th scope="col">Kode Negara</th>
                                <th scope="col">Negara</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($alamat as $address)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $address->nm_kab }}</td>
                                <td>{{ $address->nm_prov }}</td>
                                <td>{{ $address->kode }}</td>
                                <td>{{ $address->nama }}</td>
                            </tr>
                            @empty
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
                            @endforelse
                        </tbody>
                    </table>
                    {{-- {{ $alamat->links() }} --}}
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
                    <div class="mt-2 ml-2">
                        {{-- {{ $alamat->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Modal -->
@include('niagabeli.alamat.modal')
@endsection
@push('tooltip')
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip('toggle')
    })
</script>
<script>
    $(function(){
        $('#dataTable_negara').DataTable({
        });
      });
</script>
<script>
    $(function(){
        $('#dataTable_prov').DataTable({
        });
      });
</script>
<script>
    $(function(){
        $('#dataTable_kab').DataTable({
        });
      });
</script>
<script>
    $(function(){
        $('#dataTable_alamat').DataTable({
        });
      });
</script>
@endpush
