
      <!-- Main Content -->
      <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Product</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php if(!empty($produk)){?>
                            <?= $produk ?>
                        <?php } else {?>
                            <?= 0 ?>
                        <?php }?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-beer fa-2x text-gray-300"></i>
                    </div>
                </div>
                <a href="<?php echo base_url('produk') ?>" class="text-xs font-weight-bold text-primary mb-1">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Customer</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php if(!empty($cust)){?>
                            <?= $cust ?>
                        <?php } else {?>
                            <?= 0 ?>
                        <?php }?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
                <a href="<?php echo base_url('admin/dataCust') ?>" class="text-xs font-weight-bold text-success mb-1">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-dark shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Partner</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php if(!empty($user)){?>
                            <?= $user ?>
                        <?php } else {?>
                            <?= 0 ?>
                        <?php }?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
                <a href="<?php echo base_url('admin/dataMitra') ?>" class="text-xs font-weight-bold text-dark mb-1">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Location</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php if(!empty($lokasi)){?>
                            <?= $lokasi ?>
                        <?php } else {?>
                            <?= 0 ?>
                        <?php }?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-map-marker fa-2x text-gray-300"></i>
                    </div>
                </div>
                <a href="<?php echo base_url('lokasi') ?>" class="text-xs font-weight-bold text-danger mb-1">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Lending
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php if(!empty($pinjam)){?>
                            <?= $pinjam ?>
                        <?php } else {?>
                            <?= 0 ?>
                        <?php }?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
                <a href="<?php echo base_url('peminjaman') ?>" class="text-xs font-weight-bold text-info mb-1">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Return</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php if(!empty($kembali)){?>
                            <?= $kembali ?>
                        <?php } else {?>
                            <?= 0 ?>
                        <?php }?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
                <a href="<?php echo base_url('pengembalian') ?>" class="text-xs font-weight-bold text-warning mb-1">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
      <!-- End of Main Content -->