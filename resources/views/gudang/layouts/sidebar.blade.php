<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading nav-link active">SISTEM PERMINTAAN INTERNAL PC. GKBI</div>
                {{-- List User --}}
                <div class="sb-sidenav-menu-heading"><i class="fas fa-users"></i> List User</div>
                <a class="nav-link {{ Request::url() == url('user-gudang/pesanan') ? 'active' : '' }}" href="{{ URL::route('pesanan.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                    Daftar Pesanan
                </a>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-warehouse"></i></div>
                    Daftar Perbaikan
                </a>
                <a class="nav-link {{ (request()->is('user-gudang/barang-datang/*')) ? 'active' : null }}" href="{{ URL::route('bd.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-warehouse"></i></div>
                    Barang Datang
                    <span class="badge badge-danger">{{ $bdnull }}</span>

                </a>
                <a class="nav-link {{ (request()->is('user-gudang/barang-datang-proses/pengecekan/*')) ? 'active' : null }}" href="{{ URL::route('test.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-warehouse"></i></div>
                    Pengecekan Barang
                </a>
                <a class="nav-link {{ (request()->is('user-gudang/barang-datang-proses/qty/*')) ? 'active' : null }}" href="{{ URL::route('qty.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-warehouse"></i></div>
                    NPB Qty
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Masuk sebagai :</div>
            Admin
        </div>
    </nav>
</div>
