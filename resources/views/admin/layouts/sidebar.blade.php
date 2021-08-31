<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading nav-link active">SISTEM UNTUK MEMBUAT USER BARU</div>
                {{ (request()->is('projects*')) ? 'active' : null }}
                <a class="nav-link collapsed {{ request()->is('admin-unit*') ? 'active' : '' }} {{ request()->is('admin-bagian*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Unit / Bagian
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->is('admin-unit*') ? 'active' : '' }}" href="{{ URL::route('admin-unit.index') }}">Data Unit</a>
                        <a class="nav-link {{ request()->is('admin-bagian*') ? 'active' : '' }}" href="{{ URL::route('admin-bagian.index') }}">Data Bagian</a>
                    </nav>
                </div>
                {{-- List User --}}
                <div class="sb-sidenav-menu-heading"><i class="fas fa-users"></i> List User</div>
                <a class="nav-link {{ request()->is('admin-pemesan*') ? 'active' : '' }}" href="{{ URL::route('admin-pemesan.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                    User Pemesan
                </a>
                <a class="nav-link {{ request()->is('admin-gudang*') ? 'active' : '' }}" href="{{ URL::route('admin-gudang.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-warehouse"></i></div>
                    User Gudang
                </a>
                <a class="nav-link {{  request()->is('admin-pembelian*') ? 'active' : '' }}" href="{{ URL::route('admin-pembelian.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-dolly-flatbed"></i></div>
                    User Pembelian
                </a>
                <a class="nav-link {{  request()->is('admin-akuntansi') ? 'active' : '' }}" href="{{ URL::route('admin-akuntansi.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-money-check"></i></div>
                    User Akuntansi
                </a>

                {{-- Tambah Data --}}
                <div class="sb-sidenav-menu-heading"><i class="fas fa-user-plus"></i> Tambah Data User</div>
                <a class="nav-link {{ Request::url() == url('admin-pemesan/create') ? 'active' : '' }}" href="{{ URL::route('admin-pemesan.create') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                    User Pemesan
                </a>
                <a class="nav-link {{ Request::url() == url('admin-gudang/create') ? 'active' : '' }}" href="{{ URL::route('admin-gudang.create') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-warehouse"></i></div>
                    User Gudang
                </a>
                <a class="nav-link {{ Request::url() == url('admin-pembelian/create') ? 'active' : '' }}" href="{{ URL::route('admin-pembelian.create') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-dolly-flatbed"></i></div>
                    User Pembelian
                </a>
                <a class="nav-link {{ Request::url() == url('admin-akuntansi/create') ? 'active' : '' }}" href="{{ URL::route('admin-akuntansi.create') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-money-check"></i></div>
                    User Akuntansi
                </a>
            </div>
        </div>
    </nav>
</div>
