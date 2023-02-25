<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('admin.profile.show') }}" class="d-block">{{ Auth::user()->nama }}</a>
        </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @if(auth()->user()->is_admin)
                <li class="nav-item">
                    <a href="{{ route('admin.home') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            {{ __('Dashboard') }}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.jabatan.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{ __('Jabatan') }}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{ __('Karyawan') }}
                        </p>
                    </a>
                </li>

                <!-- <li class="nav-item">
                        <i class="nav-icon far fa-address-card"></i>
                    
                </li> -->

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle nav-icon"></i>
                        <p>
                            Absensi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('admin.absensis.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Absensi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.absensis.show') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Input Kehadiran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.potongan-gaji.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Potongan Gaji</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle nav-icon"></i>
                        <p>
                            Data Gaji
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('admin.gaji.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gaji</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle nav-icon"></i>
                        <p>
                            Laporan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('admin.laporan.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Slip Gaji</p>
                            </a>
                        </li>
                    </ul>
                </li>
            @else
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle nav-icon"></i>
                        <p>
                            Laporan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('admin.laporan.show') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Slip Gaji</p>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->