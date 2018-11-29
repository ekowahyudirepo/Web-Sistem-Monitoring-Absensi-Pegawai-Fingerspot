<!-- Loader -->
<div id="preloader"><div class="loader"></div></div>
<nav class="navbar page-header">
    <a href="#" class="btn btn-link sidebar-mobile-toggle d-md-none mr-auto">
        <i class="fa fa-bars"></i>
    </a>

    <a class="navbar-brand">
        SIMAB <b>IAIN KEDIRI </b>
    </a>

    <a class="btn btn-link sidebar-toggle d-md-down-none">
        <i class="fa fa-bars"></i> Menu <b class="loading"></b>
    </a>

    <ul class="navbar-nav ml-auto">

        <li class="nav-item" style="margin-right: 20px;">
            <a>Hai! ,<?php echo $this->session->userdata('username'); ?> </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo base_url('auth/logout') ?>" title="Keluar" onclick="return confirm('Apakah anda yakin untuk keluar aplikasi ?')"><i class="fa fa-power-off"></i></a>
        </li>

    </ul>
</nav>