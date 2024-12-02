<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if (config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="pt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
                @if (config('adminlte.sidebar_nav_animation_speed') != 300) data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}" @endif
                @if (!config('adminlte.sidebar_nav_accordion')) data-accordion="false" @endif>
                {{-- Configured sidebar links --}}
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link {{ request()->is('home*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Beranda</p>
                        </a>
                    </li>
                    <li class="nav-header">Master</li>
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}"
                            class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                            <i class="nav-icon far fa-user"></i>
                            <p>Pengguna</p>
                        </a>
                    </li>
                    <li
                        class="nav-item menu-is-opening {{ request()->is('asets*') | request()->is('lokasies*') | request()->is('tipe-asets*') | request()->is('kondisies*') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ request()->is('asets*') | request()->is('lokasies*') | request()->is('tipe-asets*') | request()->is('kondisies*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-pallet"></i>
                            <p>Aset <i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview"
                            style="{{ request()->is('asets*') | request()->is('lokasies*') | request()->is('tipe-asets*') | request()->is('kondisies*') ? 'display: block' : 'display: none' }}">
                            <li class="nav-item">
                                <a href="{{ route('asets.index') }}"
                                    class="nav-link {{ request()->is('asets*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-box"></i>
                                    <p>Data Aset</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('tipe-asets.index') }}"
                                    class="nav-link {{ request()->is('tipe-asets*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-boxes"></i>
                                    <p>Tipe Aset</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('lokasies.index') }}"
                                    class="nav-link {{ request()->is('lokasies*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-truck-loading"></i>
                                    <p>Lokasi Aset</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('kondisies.index') }}"
                                    class="nav-link {{ request()->is('kondisies*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-box-open"></i>
                                    <p>Kondisi Aset</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-header">Menu</li>
                    <li class="nav-item">
                        <a href="{{ route('pengajuans.index') }}"
                            class="nav-link {{ request()->is('pengajuans*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-upload"></i>
                            <p>Pengajuan Aset</p>
                        </a>
                    </li>
                    <li
                        class="nav-item menu-is-opening {{ request()->is('peminjamans*') | request()->is('peminjams*') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ request()->is('peminjamans*') | request()->is('peminjams*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-hands-helping"></i>
                            <p>Peminjaman Aset <i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview"
                            style="{{ request()->is('peminjamans*') | request()->is('peminjams*') ? 'display: block' : 'display: none' }}">
                            <li class="nav-item">
                                <a href="{{ route('peminjamans.index') }}"
                                    class="nav-link {{ request()->is('peminjamans*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Peminjaman</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('peminjams.index') }}"
                                    class="nav-link {{ request()->is('peminjams*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Peminjam</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('disposisies.index') }}"
                            class="nav-link {{ request()->is('disposisies*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-hand-holding-usd"></i>
                            <p>Disposisi Aset</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pemeliharaans.index') }}"
                            class="nav-link {{ request()->is('pemeliharaans*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-hand-holding-medical"></i>
                            <p>Pemeliharaan Aset</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pemindahans.index') }}"
                            class="nav-link {{ request()->is('pemindahans*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-people-carry"></i>
                            <p>Pemindahan Aset</p>
                        </a>
                    </li>

                </ul>
                {{-- @each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item') --}}
            </ul>
        </nav>
    </div>

</aside>
