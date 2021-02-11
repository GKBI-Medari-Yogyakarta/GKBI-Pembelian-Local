{{-- rekening --}}
@error('bank')
<div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{ $message }}
</div>
@enderror
@error('no_rekening')
<div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{ $message }}
</div>
@enderror
@error('saldo')
<div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{ $message }}
</div>
@enderror
@error('status')
<div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{ $message }}
</div>
@enderror
