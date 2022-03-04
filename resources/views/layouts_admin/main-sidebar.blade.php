<aside class="main-sidebar  elevation-1" style="background:#f0f3f3;">
    <!-- Brand Logo -->
    <a style="margin:10px;" ;href="{{ url('/') }}">
        <img src="https://vinfastauto.com/themes/porto/img/logo-header.svg" alt="vinfast" class="brand-image " style="opacity: .8;">
        <span class="brand-text">VINFAST</span>
    </a>
    <svg width="1920" height="80" viewBox="0 40 1920 80" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_2_348)">
            <path d="M111.667 120.003H-5875V-115H-5872.41L-3904.93 -54.1293H-3902.49L-1940.2 6.74133L-1937.76 6.89276L25.9048 67.7634C47.1162 68.5205 67.4121 77.1514 82.6724 91.8391L109.835 118.035L109.987 118.186L111.667 120.003Z" fill="#F0F3F3"></path>
            <path d="M6098.33 -115V120.003H111.668L113.346 118.338L114.262 117.278L113.346 118.338L140.662 91.8391C143.561 89.1136 146.613 86.5394 149.665 84.2682C151.802 82.754 153.938 81.2398 156.227 79.877C160.653 77.1514 165.383 74.8801 170.419 73.0631C174.082 71.7003 177.896 70.489 181.711 69.7319C186.9 68.5205 192.088 67.9148 197.429 67.7634L2161.09 6.89276L2163.53 6.74133L4125.82 -54.1293H4128.26L6095.89 -115H6098.33Z" fill="#F0F3F3"></path>
            <path d="M6098.33 -120V-115.003H6095.89L4128.41 -54.1325H4125.97L2163.68 6.73817L2161.24 6.8896L197.58 67.7603C192.239 67.9117 187.051 68.6688 181.862 69.7287C178.047 70.6372 174.232 71.6972 170.57 73.0599C165.687 74.877 160.956 77.1483 156.378 79.8738C154.089 81.2366 151.953 82.7508 149.816 84.265C146.612 86.5363 143.56 89.1104 140.812 91.836L113.498 118.334L114.413 117.274L113.498 118.334L111.819 120L109.987 118.334L109.835 118.183L82.6724 91.9874C67.4121 77.2997 47.1162 68.6688 25.9048 67.9117L-1937.76 6.8896L-1940.2 6.73817L-3902.49 -54.1325H-3904.93L-5872.41 -115.003H-5875V-120L-3902.33 -58.6751L-1940.2 1.89275L26.0571 62.9148C48.6421 63.8233 70.0059 72.9085 86.1816 88.5047L111.667 113.186L137.15 88.5047C144.17 81.6908 152.258 76.0883 161.109 71.8486C169.807 67.6088 179.268 64.8833 189.035 63.5205C191.781 63.2177 194.681 62.9148 197.428 62.7634L2163.68 1.74133L4125.82 -58.8265L6098.33 -120Z" fill="#1464F4"></path>
        </g>
        <defs>
            <clipPath id="clip0_2_348">
                <rect width="1920" height="120" fill="black"></rect>
            </clipPath>
        </defs>
    </svg>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('image/testava.png') }}" class="img-circle elevation-2" alt="admin Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-user"></i>
                        <p>
                            Hồ Sơ
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/profile') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hồ Sơ Của Tôi</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-list-check"></i>
                        <p>
                            Quản Lý Chung
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/general/report') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Báo Cáo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/general/employee') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản Lý Nhân Viên</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/general/customer') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản Lý Khách Hàng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/general/customer') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản Lý Model</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-car"></i>
                        <p>
                            Quản Lý Showroom
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/showroom') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quan Lý Đơn Hàng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/showroom/carmanage') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quan Lý Xe</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-warehouse"></i>
                        <p>
                            Quản Lý Kho
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/warehouse') }}" class="nav-link">
                                <!-- trang can chuyen -->
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản Lý Xe</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/warehouse/stock') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản Lý Tồn Kho</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu --><ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- logout admin Trung -->
        <li class="nav-item">
            <a href="{{ route('admin.logout') }}" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
            <form action="{{ route('admin.logout') }}" id="logout-form" class="d-none" method="post">
                @csrf
            </form>
        </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>