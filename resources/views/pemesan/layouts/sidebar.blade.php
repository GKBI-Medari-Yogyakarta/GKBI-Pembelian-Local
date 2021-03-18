<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading nav-link active">SISTEM PEERMINTAAN INTERNAL PC. GKBI</div>
                {{-- List User --}}
                <div class="sb-sidenav-menu-heading"><i class="fas fa-users"></i> List Daftar Permintaan</div>
                <a class="nav-link {{ (request()->is('user-pemesan/input-barang*')) ? 'active' : '' }}" href="{{ URL::route('input.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-dolly-flatbed"></i></div>
                    Daftar Barang
                </a>
                <a class="nav-link {{ (request()->is('user-pemesan/permintaan-pembelian*')) ? 'active' : '' }}" href="{{ URL::route('permintaan-pembelian.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-dolly-flatbed"></i></div>
                    Permintaan Pembelian
                </a>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-warehouse"></i></div>
                    Permintaan Perbaikan
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Masuk sebagai :</div>
            Admin
        </div>
    </nav>
</div>
