<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading nav-link active">SISTEM PEERMINTAAN INTERNAL PC. GKBI</div>
                {{-- List User --}}
                <div class="sb-sidenav-menu-heading"><i class="fas fa-users"></i> List User</div>
                <a class="nav-link {{ Request::url() == url('user-akuntansi/rekening') ? 'active' : '' }}" href="{{ URL::route('rekening.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-file-invoice-dollar"></i></div>
                    Data Rekening
                </a>
                <a class="nav-link {{ Request::url() == url('user-pembelian/alamat/supplier') ? 'active' : '' }}" href="{{ URL::route('supplier.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                    Input Pembayaran
                </a>
                <a class="nav-link {{ Request::url() == url('user-pemesan/permintaan-pembelian') ? 'active' : '' }}" href="{{ URL::route('permintaan-pembelian.index') }}">
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
