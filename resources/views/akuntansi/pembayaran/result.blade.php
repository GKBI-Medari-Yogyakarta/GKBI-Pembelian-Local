@extends('akuntansi.layouts.main')
@section('title','Riwayat Pembayaran')
@section('status-user','Akuntansi Page')
@section('main')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Riwayat pembayaran</h1>
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
                <div class="row">
                    <div class="col">
                        <i class="fas fa-table mr-1"></i>
                        DataTable
                    </div>
                    <div class="col text-right">
                        <form action="{{ URL::route('search') }}" method="GET">
                            @csrf
                            <input type="month" name="cari" id="cari">
                            <button type="submit" class="btn btn-info btn-sm">cari</button>
                            <a href="{{ URL::route('history.index') }}" class="btn btn-info btn-sm">clear</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered" id="dataTable_ok">
                        <thead>
                            <tr>
                                <th scope="col" class="align-center">#</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Tipe</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Saldo</th>
                                <th scope="col">total</th>
                                <th scope="col">Saldo</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th colspan="4" scope="col" class="text-center">Pembayaran</th>
                                <th></th>
                                <th>Awal</th>
                                <th>Dibayarkan</th>
                                <th>Akhir</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($payment as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->payment_code }}</td>
                                <td>{{ $item->payment_type }}</td>
                                @if ($item->payment_status == '1')
                                <td>Lunas</td>
                                @else
                                <td class="text-danger">Belum lunas</td>
                                @endif
                                @if (!empty($item->payment_date))
                                <td>{{ \Carbon\Carbon::parse($item->payment_date)->isoformat('dddd, D MMM Y')}}</td>
                                @else
                                <td></td>
                                @endif
                                <td>{{ $item->keterangan }}</td>
                                <td>Rp. <span class="money">{{ $item->saldo_awal }}</span></td>
                                <td>Rp. <span class="money">{{ $item->dibayarkan }}</span></td>
                                <td>Rp. <span class="money">{{ $item->saldo_akhir }}</span></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center h1">Kosong</td>
                            </tr>
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
        $('#myLargeModal').modal({show: true});
    </script>
@endpush
@push('tooltip')
<script>
    $(function(){
        $('#dataTable_ok').DataTable({
        });
      });
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
