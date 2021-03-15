<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading nav-link active">SISTEM PEERMINTAAN INTERNAL PC. GKBI</div>
                <div class="sb-sidenav-menu-heading"><i class="fas fa-users"></i> List User</div>
                <a class="nav-link {{ (request()->is('user-akuntansi/rekening*')) ? 'active' : '' }}" href="{{ URL::route('rekening.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-file-invoice-dollar"></i></div>
                    Data Rekening
                </a>
                <a class="nav-link {{ (request()->is('user-akuntansi/input-pembayaran/*')) ? 'active' : null}}" href="{{ URL::route('payment.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                    Input Pembayaran
                </a>
                <a class="nav-link {{ (request()->is('user-akuntansi/input-pembayaran/riwayat-pembayaran/')) ? 'active' : null}} {{ (request()->is('user-akuntansi/input-pembayaran/riwayat-pembayaran/search?*')) ? 'active' : null}}" href="{{ URL::route('history.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                    Riwayat Pembayaran
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Masuk sebagai :</div>
            {{ auth()->guard('akuntansi')->user()->name }}
        </div>
    </nav>
</div>
