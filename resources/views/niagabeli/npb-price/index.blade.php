@extends('niagabeli.layouts.main')
@section('title','NPB Price Page')
@section('status-user','Niagabeli Page')
@section('custom-style')
@section('main')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">NPB Price</h1>
            @if(session('msg'))
                <div class="alert alert-success alert-dismissible" role="alert" style="z-index: 1">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('msg') }}
                </div>
            @endif
            <div class="row">
                <div class="col">
                    <div class="card mb-4 mt-4">
                        <div class="card-header">
                            <div class="row">
                                <div class="col col-md-8">
                                    <i class="fas fa-table mr-1"></i>
                                    Daftar NPB Price
                                </div>
                                <div class="col col-md-4">
                                    <form action="{{ url()->current() }}">
                                        <div class="form-row">
                                            <div class="col col-sm-8">
                                                <input type="month" class="form-control form-control-sm" name="date" value="{{ request('date') }}">
                                            </div>
                                            <div class="col col-sm-4 text-right">
                                                <button type="submit" class="btn btn-sm btn-info">cari</button>
                                                <a href="{{ URL::route('price.index') }}" class="btn btn-sm btn-primary">clear</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-sm" id="npb_price">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" scope="col" class="text-center align-middle">#</th>
                                            <th rowspan="2" scope="col" class="text-center align-middle">Bagian</th>
                                            <th colspan="2" scope="col" class="text-center">Nomor Agenda</th>
                                            <th colspan="3" scope="col" class="text-center">SPB</th>
                                            <th rowspan="2" scope="col" class="text-center align-middle">Rencana <br>Pembelian</th>
                                            <th rowspan="2" scope="col" class="text-center align-middle">Sesuai SOP</th>
                                        </tr>
                                        <tr>
                                            <th scope="col" class="text-center">Gudang</th>
                                            <th scope="col" class="text-center">Pembelian</th>
                                            <th scope="col" class="text-center">Nota</th>
                                            <th scope="col" class="text-center">Satuan</th>
                                            <th scope="col" class="text-center">Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($price as $prices)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $prices->nama }}</td>
                                            <td>{{ $prices->no_agenda_gudang }}</td>
                                            <td>{{ $prices->no_agenda_pembelian }}</td>
                                            <td>{{ $prices->nota_spb }}</td>
                                            <td>{{ $prices->satuan }}</td>
                                            <td>{{ $prices->total_hrg }}</td>
                                            <td>{{ $prices->rencana_beli }}</td>
                                            <td @if($prices->sesuai_sop == null)) class="bg-warning" @endif
                                                @if($prices->sesuai_sop == '0')) class="text-center" @endif
                                                @if($prices->sesuai_sop == '1')) class="tex-left" @endif>
                                                @if($prices->sesuai_sop === null)
                                                <form action="{{ URL::route('price.update',$prices->id) }}" method="POST" class="btn btn-sm p-0 m-0">
                                                    @csrf
                                                    @method('put')
                                                    <input class="btn btn-sm btn-info" type="submit" name="action" value="Ya">
                                                </form>
                                                <form action="{{ URL::route('price.update',$prices->id) }}" method="POST" class="btn btn-sm p-0 m-0">
                                                    @csrf
                                                    @method('put')
                                                    <input class="btn btn-sm btn-info" type="submit" name="action" value="Tidak">
                                                </form>
                                                @else
                                                    @if($prices->sesuai_sop !== '0')
                                                    <button class="btn btn-sm btn-success text-left">Ya</button>
                                                    @else
                                                    <button class="btn btn-sm btn-danger text-right">Tidak</button>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="11" class="text-center">
                                                <h3>Data NPB Price masih kosong!!</h3>
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
@endsection
@push('tooltip')
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip('toggle')
    })
</script>
<script>
    $(function(){
        $('#npb_price').DataTable({
        });
      });
</script>
@endpush
