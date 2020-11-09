<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Mahasiswa/mDashboard'); ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-handshake"></i>
        </div>
        <div class="sidebar-brand-text mx-2 text-capitalize">Appointment</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <?php if ($title == 'Dashboard') : ?>
        <li class="nav-item active">
        <?php else : ?>
        <li class="nav-item">
        <?php endif; ?>

        <a class="nav-link" href="<?= base_url('Mahasiswa/mDashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Menu
        </div>

        <!-- Nav Item - Jadwal -->
        <?php if ($title == 'Jadwal') : ?>
            <li class="nav-item active">
            <?php else : ?>
            <li class="nav-item">
            <?php endif; ?>

            <a class="nav-link" href="<?= base_url('Mahasiswa/mJadwal'); ?>">
                <i class="fas fa-fw fa-calendar-alt"></i>
                <span>Jadwal</span>
            </a>
            </li>

            <!-- Nav Item - Dosen -->
            <?php if ($title == 'Data Dosen') : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>

                <a class="nav-link collapsed" href="<?= base_url('Mahasiswa/mDataDosen'); ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data Dosen</span>
                </a>
                </li>

                <!-- Nav Item - Chat -->
                <?php if ($title == 'Chat') : ?>
                    <li class="nav-item active">
                    <?php else : ?>
                    <li class="nav-item">
                    <?php endif; ?>

                    <a class="nav-link" href="<?= base_url('Mahasiswa/mChat'); ?>">
                        <i class="fas fa-fw fa-comments"></i>
                        <span>Chat</span>
                    </a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider d-none d-md-block">

                    <!-- Sidebar Toggler (Sidebar) -->
                    <div class="text-center d-none d-md-inline">
                        <button class="rounded-circle border-0" id="sidebarToggle"></button>
                    </div>

</ul>
<!-- End of Sidebar -->