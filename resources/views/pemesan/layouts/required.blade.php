{{-- alamat --}}
@error('nama')
    <div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ $message }}
    </div>
@enderror
@error('kode')
    <div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ $message }}
    </div>
@enderror
@error('negara_id')
    <div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ $message }}
    </div>
@enderror
@error('alias')
    <div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ $message }}
    </div>
@enderror
@error('prov_id')
    <div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ $message }}
    </div>
@enderror
@error('kota')
    <div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ $message }}
    </div>
@enderror

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
