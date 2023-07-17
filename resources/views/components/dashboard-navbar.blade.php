<div>
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
            <div class="sidebar-brand-icon">
                {{-- <img src="{{ asset('assets/ruangadmin') }}/img/logo/logo2.png"> --}}
                <img src="{{ asset('assets') }}/logo2.png">
            </div>
            {{-- <div class="sidebar-brand-text mx-3">RUANGLAB</div> --}}
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Beranda</span></a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Features
        </div>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('daftar-barang') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Data Barang</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('daftar-penawaran') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Penawaran</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('daftar-invoice') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Invoice</span></a>
        </li>
        @if ($users->login_level == 'user')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('buat-penawaran') }}">
                    <i class="fas fa-fw fa-palette"></i>
                    <span>Pengadaan & Peminjaman</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('buat-penawaran') }}">
                    <i class="fas fa-fw fa-palette"></i>
                    <span>Pelayanan Jasa</span>
                </a>
            </li>
        @endif
        <hr class="sidebar-divider">
        @if ($users->login_level == 'admin')
            <div class="sidebar-heading">
                MORE
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable3"
                    aria-expanded="true" aria-controls="collapseTable3">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Kelola User</span>
                </a>
                <div id="collapseTable3" class="collapse" aria-labelledby="headingTable"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">User Management</h6>
                        {{-- <a class="collapse-item" href="simple-tables.html">Administrator</a> --}}
                        <a class="collapse-item" href="{{ route('daftar-user') }}">Daftar Pengguna</a>
                    </div>
                </div>
            </li>
        @endif
        {{-- <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable4"
                aria-expanded="true" aria-controls="collapseTable4">
                <i class="fas fa-fw fa-table"></i>
                <span>Settings</span>
            </a>
            <div id="collapseTable4" class="collapse" aria-labelledby="headingTable"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Settings</h6>
                    <a class="collapse-item" href="simple-tables.html">Administrator</a>
                    <a class="collapse-item" href="datatables.html">User Akun</a>
                </div>
            </div>
        </li> --}}
        {{-- <div class="version" id="version-ruangadmin"></div> --}}
    </ul>
</div>
