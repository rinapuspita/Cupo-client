<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <img src="<?= 'https://rest-server-cupo.000webhostapp.com/assets/images/logo.png'?>" style="width: 35px; height:40px;"/>
        <!-- <i class="fas fa-laugh-wink"></i> -->
    </div>
    <?php if($this->session->userdata('level') == '1'){ ?>
        <div class="sidebar-brand-text mx-3">Cupo Admin</div>
    <?php } ?>
    <?php if($this->session->userdata('level') == '2'){ ?>
        <div class="sidebar-brand-text mx-3">Cupo Mitra</div>
    <?php } ?>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<?php if($this->session->userdata('level') == '1'){ ?>
<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="#">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('produk'); ?>">
        <i class="fa fa-beer"></i>
        <span>Data Produk</span>
    </a>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fa fa-users"></i>
        <span>Data User</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <!-- <a class="collapse-item" href="#">Data Admin</a> -->
            <a class="collapse-item" href="<?= base_url('admin/dataMitra'); ?>">Data Mitra</a>
            <a class="collapse-item" href="<?= base_url('admin/dataCust'); ?>">Data Customer</a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('produk/getcupKotor'); ?>">
        <i class="fa fa-cogs"></i>
        <span>Maintenance</span>
    </a>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('produk/dataAdmin'); ?>">
        <i class="fa fa-truck"></i>
        <span>Distribusi</span>
    </a>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('produk/getcupKotor'); ?>">
        <i class="fa fa-file"></i>
        <span>Laporan</span>
    </a>
</li>

<!-- Divider -->
<!-- <hr class="sidebar-divider"> -->

<!-- Nav Item - Pages Collapse Menu -->
<!-- <li class="nav-item">
    <a class="nav-link" href="#" >
        <i class="fas fa-fw fa-folder"></i>
        <span>Request Cup</span>
    </a>
</li> -->

<!-- Nav Item - Charts -->
<!-- <li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Return Cup</span></a>
</li> -->
<?php } ?>
<?php if($this->session->userdata('level') == '2'){ ?>
<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="<?= base_url('user'); ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('produk/dataMitra'); ?>">
        <i class="fas fa-fw fa-cog"></i>
        <span>Produk</span>
    </a>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('peminjaman/'); ?>" >
        <i class="fas fa-fw fa-folder"></i>
        <span>Peminjaman</span>
    </a>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('pengembalian/'); ?>">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Pengembalian</span></a>
</li>
<?php } ?>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
