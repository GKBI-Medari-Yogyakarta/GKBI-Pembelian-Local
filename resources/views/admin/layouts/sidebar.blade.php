<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading nav-link active">SISTEM UNTUK MEMBUAT USER BARU</div>
                {{-- List User --}}
                <div class="sb-sidenav-menu-heading"><i class="fas fa-users"></i> List User</div>
                <a class="nav-link {{ Request::url() == url('admin-pemesan') ? 'active' : '' }}" href="{{ URL::route('admin-pemesan.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                    User Pemesan
                </a>
                <a class="nav-link {{ Request::url() == url('admin-gudang') ? 'active' : '' }}" href="{{ URL::route('admin-gudang.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-warehouse"></i></div>
                    User Gudang
                </a>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-dolly-flatbed"></i></div>
                    User Pembelian
                </a>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-money-check"></i></div>
                    User Akuntansi
                </a>

                {{-- Tambah Data --}}
                <div class="sb-sidenav-menu-heading"><i class="fas fa-user-plus"></i> Tambah Data User</div>
                <a class="nav-link {{ Request::url() == url('admin-pemesan/create') ? 'active' : '' }}" href="{{ URL::route('admin-pemesan.create') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                    User Pemesan
                </a>
                <a class="nav-link {{ Request::url() == url('admin-gudang/create') ? 'active' : '' }}" href="{{ URL::route('admin-gudang.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-warehouse"></i></div>
                    User Gudang
                </a>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-dolly-flatbed"></i></div>
                    User Pembelian
                </a>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-money-check"></i></div>
                    User Akuntansi
                </a>
            </div>
        </div>
        {{-- <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Admin
        </div> --}}
    </nav>
</div>
