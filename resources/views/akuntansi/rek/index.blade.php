@extends('akuntansi.layouts.main')
@section('title','Akuntansi Page')
@section('status-user','Akuntansi Page')
@section('main')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Daftar Rekening</h1>
        @if(session('msg'))
        <div class="alert alert-success alert-dismissible" role="alert" style="z-index: 1">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session('msg') }}
        </div>
        @endif
        @include('akuntansi.layouts.required')
        <div class="card mb-4 mt-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                DataTable Daftar Rekening
            </div>
            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                        <thead>
                            <tr>
                                <th class="p-2" scope="col">#</th>
                                <th class="p-2" scope="col">Nama Bank</th>
                                <th class="p-2" scope="col">No. Rekening</th>
                                <th class="p-2" scope="col">Saldo</th>
                                <th class="p-2" scope="col">Status Kepemilikan</th>
                                <th class="p-2" scope="col">Supplier</th>
                                <th class="p-2" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($rek as $rekening)
                            <tr>
                                <td class="p-2">{{ $loop->iteration }}</td>
                                <td class="p-2">{{ $rekening->bank }}</td>
                                <td class="p-2">{{ $rekening->no_rekening }}</td>
                                <td class="p-2">Rp. <span class="money">{{ $rekening->saldo }}</span></td>
                                <td class="p-2">{{ $rekening->status }}</td>
                                <td class="p-2">
                                    {{ $rekening->sup_id }}
                                </td>
                                <td class="p-2">
                                    <a href="{{ URL::route('rekening.edit',$rekening->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>
                                    <form action="{{ URL::route('rekening.destroy',$rekening->id) }}" method="POST" class="btn btn-sm p-0">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-outline-danger btn-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    <h3>Data Supplier masih kosong!!</h3>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="ml-2 mt-4 mb-4">
                        <button data-toggle="modal" data-target="#tambahRekening" class="btn btn-outline-primary btn-sm">
                            Tambah Rekening
                        </button>
                    </div>
                    <div class="mt-2 ml-2">
                        {{-- {{ $supplier->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Modal -->
@include('akuntansi.rek.modal')
@endsection
@push('tooltip')
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip('toggle')
    })
</script>
<script>
    let x = document.querySelectorAll(".money");
    for (let i = 0, len = x.length; i < len; i++) {
        let num = Number(x[i].innerHTML)
                  .toLocaleString('ID');
        x[i].innerHTML = num;
        x[i].classList.add("currSign");
    }
</script>
@endpush
