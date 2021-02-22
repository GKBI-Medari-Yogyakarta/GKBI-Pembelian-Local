<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading nav-link active">SISTEM PEERMINTAAN INTERNAL PC. GKBI</div>
                {{-- List User --}}
{{--                <div class="sb-sidenav-menu-heading"><i class="fas fa-users"></i> List User</div>--}}
                <a class="nav-link {{ (request()->is('user-pembelian/alamat')) ? 'active' : '' }} {{ (request()->is('user-pembelian/negara*')) ? 'active' :'' }}{{ (request()->is('user-pembelian/provinsi*')) ? 'active' :'' }}{{ (request()->is('user-pembelian/kabupaten*')) ? 'active' :'' }} " href="{{ URL::route('negara.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                    Alamat
                </a>
                <a class="nav-link {{ (request()->is('user-pembelian/alamat/supplier*')) ? 'active' : '' }}" href="{{ URL::route('supplier.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                    Alamat Supplier
                </a>
                <a class="nav-link {{ (request()->is('user-pembelian/permintaan-pembelian/pembelian*')) ? 'active' : '' }}" href="{{ URL::route('transaction.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-dolly-flatbed"></i></div>
                    Permintaan Pembelian
                </a>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-warehouse"></i></div>
                    Permintaan Perbaikan
                </a>
                <a class="nav-link {{ (request()->is('user-pembelian/surat/jalan*')) ? 'active' : null }}" href="{{ URL::route('jalan.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-warehouse"></i></div>
                    Surat Jalan
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Masuk sebagai :</div>
            Admin
        </div>
    </nav>
</div>
