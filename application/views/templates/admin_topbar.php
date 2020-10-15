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

            <!-- Heading -->
            <div class="nav-item d-sm-flex align-items-center">
                <h1 class="h3 mb-0 pl-4 font-weight-bold text-body"><?= $title; ?></h1>
            </div>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <div class="topbar-divider d-none d-sm-block"></div>
                <div class="nav-item d-sm-flex align-items-center">
                    <a href=" <?= base_url('Auth/logout'); ?>" class="btn btn-danger ">Logout</a>
                </div>

            </ul>

        </nav>
        <!-- End of Topbar -->