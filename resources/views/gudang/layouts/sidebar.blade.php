<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading nav-link active">SISTEM PERMINTAAN INTERNAL PC. GKBI</div>
                <div class="sb-sidenav-menu-heading"><i class="fas fa-users"></i> Halaman User Gudang</div>
                <a class="nav-link {{ (request()->is('user-gudang/barang-datang/*')) ? 'active' : null }}" href="{{ URL::route('bd.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                    Barang Datang
                    <span class="badge badge-danger">{{ $bdnull }}</span>
                </a>
                <a class="nav-link {{ (request()->is('user-gudang/barang-datang-proses/pengecekan/*')) ? 'active' : null }}" href="{{ URL::route('test.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-box-open"></i></div>
                    Pengecekan Barang
                </a>
                <a class="nav-link {{ (request()->is('user-gudang/barang-datang-proses/qty/*')) ? 'active' : null }}" href="{{ URL::route('qty.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-boxes"></i></div>
                    NPB Qty
                </a>
                <a class="nav-link {{ (request()->is('user-gudang/daftar-barang/*')) ? 'active' : null }}" href="{{ URL::route('item.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-hamburger"></i></div>
                    Daftar Barang
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Masuk sebagai :</div>
            {{ auth()->guard('gudang')->user()->name }}
        </div>
    </nav>
</div>
