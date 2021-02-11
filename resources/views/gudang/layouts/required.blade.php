{{-- permintaan --}}
@error('pemesan')
    <div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ $message }}
    </div>
@enderror
@error('no_pemesan')
    <div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ $message }}
    </div>
@enderror
@error('tgl_pesanan')
    <div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ $message }}
    </div>
@enderror
@error('nm_barang')
    <div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ $message }}
    </div>
@enderror
@error('spesifikasi')
    <div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ $message }}
    </div>
@enderror
@error('unit_stok')
    <div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ $message }}
    </div>
@enderror
@error('gudang_stok')
    <div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ $message }}
    </div>
@enderror
@error('jumlah')
    <div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ $message }}
    </div>
@enderror
@error('tgl_diperlukan')
    <div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ $message }}
    </div>
@enderror
@error('bagian_id')
    <div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ $message }}
    </div>
@enderror
