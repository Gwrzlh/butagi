<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <?php if ($_SESSION['role'] == 'admin_ruangan') : ?>
                    <div class="sidebar-brand-text mx-3">Admin Ruangan</div>
                    <?php else : ?>
                        <div class="sidebar-brand-text mx-3">Superadmin</div>
                <?php endif; ?>
            </a>

            <?php if ($_SESSION['role'] == 'admin_ruangan') : ?>
                <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo ($this->uri->segment(2) == '') ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= base_url('AdminController/') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Export Tamu
            </div>
            <!-- Nav Item - Charts -->
            <li class="nav-item <?php echo ($this->uri->segment(2) == 'export_guests') ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= base_url('AdminController/export_guests') ?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Export Data Tamu</span>
                </a>
            </li>

            <?php else : ?>
                <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo ($this->uri->segment(2) == '') ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= base_url('superadmin/') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Export Tamu
            </div>
            <!-- Nav Item - Charts -->
            <li class="nav-item <?php echo ($this->uri->segment(2) == 'export_guests') ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= base_url('superadmin/export_guests') ?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Export Data Tamu</span>
                </a>
            </li>

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin Ruangan
            </div>
            <!-- Nav Item - Charts -->
            <li class="nav-item <?php echo ($this->uri->segment(2) == 'manage_admins') ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= base_url('superadmin/manage_admins') ?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Kelola Admin</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Ruangan
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item <?php echo ($this->uri->segment(2) == 'manage_rooms') ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= base_url('superadmin/manage_rooms') ?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Kelola Ruangan</span>
                </a>
            </li>
            <?php endif; ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item">
                            <span class="nav-link" href="#">
                                <span class="mr-2 d-none d-lg-inline badge badge-primary"><?php echo $_SESSION['room_name']; ?></span>
                            </span>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['name']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url('assets/sbadmin2/'); ?>img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('login/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->