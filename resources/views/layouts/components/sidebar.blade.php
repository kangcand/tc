<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('assets/brand/coreui.svg#full') }}"></use>
        </svg>
        <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('assets/brand/coreui.svg#signet') }}"></use>
        </svg>
    </div>
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ request()->is('admin/') ? 'c-active' : '' }}"
                href="{{ url('/admin') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                </svg> Dashboard<span class="badge badge-info">NEW</span></a>
        </li>
        @if(Auth::user()->role == 'Petugas')
        @else
        <li class="c-sidebar-nav-title">User Management</li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ request()->is('admin/users*') ? 'c-active' : '' }}"
                href="{{ url('/admin/provinsi') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
                </svg> Data Users
            </a>
        </li>
        @endif
        <li class="c-sidebar-nav-title">Data Master</li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ request()->is('admin/provinsi*') ? 'c-active' : '' }}"
                href="{{ url('/admin/provinsi') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-blur') }}"></use>
                </svg> Provinsi
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ request()->is('admin/kota*') ? 'c-active' : '' }}"
                href="{{ url('/admin/kota') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-blur-circular') }}"></use>
                </svg> Kota / Kabupaten
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ request()->is('admin/kecamatan*') ? 'c-active' : '' }}"
                href="{{ url('/admin/kecamatan') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-blur-linear') }}"></use>
                </svg> Kecamatan
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ request()->is('admin/kelurahan*') ? 'c-active' : '' }}"
                href="{{ url('/admin/kelurahan') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-clear-all') }}"></use>
                </svg> Kelurahan
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ request()->is('admin/rw*') ? 'c-active' : '' }}"
                href="{{ route('rw.index') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-drop') }}"></use>
                </svg> Rukun Warga
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ request()->is('admin/kasus*') ? 'c-active' : '' }}"
                href="{{ route('kasus.index') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-3d') }}"></use>
                </svg> Kasus
            </a>
        </li>
        @if(Auth::user()->role == 'Petugas')
        @else
            <li class="c-sidebar-nav-title">Data Laporan</li>
            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a
                    class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                    </svg> Laporan Provinsi</a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/breadcrumb.html"><span
                                class="c-sidebar-nav-icon"></span> Breadcrumb</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/cards.html"><span
                                class="c-sidebar-nav-icon"></span> Cards</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/carousel.html"><span
                                class="c-sidebar-nav-icon"></span> Carousel</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/collapse.html"><span
                                class="c-sidebar-nav-icon"></span> Collapse</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/forms.html"><span
                                class="c-sidebar-nav-icon"></span> Forms</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/jumbotron.html"><span
                                class="c-sidebar-nav-icon"></span> Jumbotron</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/list-group.html"><span
                                class="c-sidebar-nav-icon"></span> List group</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/navs.html"><span
                                class="c-sidebar-nav-icon"></span> Navs</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/pagination.html"><span
                                class="c-sidebar-nav-icon"></span> Pagination</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/popovers.html"><span
                                class="c-sidebar-nav-icon"></span> Popovers</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/progress.html"><span
                                class="c-sidebar-nav-icon"></span> Progress</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/scrollspy.html"><span
                                class="c-sidebar-nav-icon"></span> Scrollspy</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/switches.html"><span
                                class="c-sidebar-nav-icon"></span> Switches</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/tables.html"><span
                                class="c-sidebar-nav-icon"></span> Tables</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/tabs.html"><span
                                class="c-sidebar-nav-icon"></span> Tabs</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/tooltips.html"><span
                                class="c-sidebar-nav-icon"></span> Tooltips</a></li>
                </ul>
            </li>
            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a
                    class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-cursor') }}"></use>
                    </svg> Laporan Kota</a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/buttons.html"><span
                                class="c-sidebar-nav-icon"></span> Buttons</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/button-group.html"><span
                                class="c-sidebar-nav-icon"></span> Buttons Group</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/dropdowns.html"><span
                                class="c-sidebar-nav-icon"></span> Dropdowns</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/brand-buttons.html"><span
                                class="c-sidebar-nav-icon"></span> Brand Buttons</a></li>
                </ul>
            </li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="charts.html">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-chart-pie') }}"></use>
                    </svg> Laporan Kecamatan</a></li>
            <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-star') }}"></use>
                    </svg> Laporan Kelurahan</a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="icons/coreui-icons-free.html">
                            CoreUI Icons<span class="badge badge-success">Free</span></a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="icons/coreui-icons-brand.html">
                            CoreUI Icons - Brand</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="icons/coreui-icons-flag.html">
                            CoreUI Icons - Flag</a></li>
                </ul>
            </li>
            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a
                    class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-bell') }}"></use>
                    </svg> Laporan RW</a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="notifications/alerts.html"><span
                                class="c-sidebar-nav-icon"></span> Alerts</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="notifications/badge.html"><span
                                class="c-sidebar-nav-icon"></span> Badge</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="notifications/modals.html"><span
                                class="c-sidebar-nav-icon"></span> Modals</a></li>
                </ul>
            </li>
        @endif
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="widgets.html">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-calculator') }}"></use>
                </svg> Widgets<span class="badge badge-info">NEW</span></a></li>
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
        data-class="c-sidebar-minimized"></button>
</div>
