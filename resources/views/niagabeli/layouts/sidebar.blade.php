<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading nav-link active">SISTEM PEERMINTAAN INTERNAL PC. GKBI</div>
                <a class="nav-link {{ (request()->is('user-pembelian/alamat')) ? 'active' : '' }} {{ (request()->is('user-pembelian/negara*')) ? 'active' :'' }}{{ (request()->is('user-pembelian/provinsi*')) ? 'active' :'' }}{{ (request()->is('user-pembelian/kabupaten*')) ? 'active' :'' }} " href="{{ URL::route('negara.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                    Alamat
                </a>
                <a class="nav-link {{ (request()->is('user-pembelian/alamat/supplier*')) ? 'active' : '' }}" href="{{ URL::route('supplier.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-map-marked-alt"></i></div>
                    Alamat Supplier
                </a>
                <a class="nav-link {{ (request()->is('user-pembelian/permintaan-pembelian/pembelian*')) ? 'active' : '' }}" href="{{ URL::route('transaction.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-dolly-flatbed"></i></div>
                    Permintaan Pembelian
                </a>
                {{-- <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-warehouse"></i></div>
                    Permintaan Perbaikan
                </a> --}}
                <a class="nav-link {{ (request()->is('user-pembelian/surat/jalan*')) ? 'active' : null }}" href="{{ URL::route('jalan.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-paper-plane"></i></div>
                    Surat Jalan
                </a>
                <a class="nav-link {{ (request()->is('user-pembelian/surat/ijin-masuk*')) ? 'active' : null }}" href="{{ URL::route('sim.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-paper-plane" style="transform: rotate(180deg);"></i></div>
                    Surat Ijin Masuk
                </a>
                <a class="nav-link {{ (request()->is('user-pembelian/surat/mikeluar/*')) ? 'active' : null }}" href="{{ URL::route('mikeluar.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                    MI keluar
                </a>
                <a class="nav-link {{ (request()->is('user-pembelian/surat/MI/ijin-keluar/*')) ? 'active' : null }}" href="{{ URL::route('ijin-keluar.index') }}">
                    <div class="sb-nav-link-icon"><i class="far fa-paper-plane"></i></div>
                    Surat Ijin Keluar
                </a>
                <a class="nav-link {{ (request()->is('user-pembelian/surat/pembuatan-npb-price/*')) ? 'active' : null }}" href="{{ URL::route('price.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-money-check-alt"></i></div>
                    NPB Price
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Masuk sebagai :</div>
            {{ auth()->guard('pembelian')->user()->name }}
        </div>
    </nav>
</div>
