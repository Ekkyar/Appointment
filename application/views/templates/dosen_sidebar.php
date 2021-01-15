<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Dosen/DDashboard'); ?>">
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

        <a class="nav-link" href="<?= base_url('Dosen/DDashboard'); ?>">
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

            <a class="nav-link" href="<?= base_url('Dosen/DJadwal'); ?>">
                <i class="fas fa-fw fa-calendar-alt"></i>
                <span>Jadwal</span>
            </a>
            </li>

            <!-- Nav Item - Chat -->
            <?php if ($title == 'Chat') : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>

                <a class="nav-link" href="<?= base_url('Dosen/DChat'); ?>">
                    <i class="far fa-fw fa-comment-dots"></i>
                    <span>Chat</span>
                </a>
                </li>

                <!-- Nav Item - Data Mahasiswa -->
                <?php if ($title == 'Data Mahasiswa') : ?>
                    <li class="nav-item active">
                    <?php else : ?>
                    <li class="nav-item">
                    <?php endif; ?>

                    <a class="nav-link" href="<?= base_url('Dosen/DDataMahasiswa'); ?>">
                        <i class="fas fa-fw fa-user-graduate"></i>
                        <span>Data Mahasiswa</span>
                    </a>
                    </li>


                    <!-- Nav Item - Request -->
                    <?php if ($title == 'Request') : ?>
                        <li class="nav-item active">
                        <?php else : ?>
                        <li class="nav-item">
                        <?php endif; ?>

                        <a class="nav-link" href="<?= base_url('Dosen/DRequest'); ?>">
                            <i class="fas fa-fw fa-handshake"></i>
                            <span>Request</span>
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