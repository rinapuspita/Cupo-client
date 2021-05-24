
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
                <a href="<?php echo base_url('produk/dataMitra') ?>" class="text-xs font-weight-bold text-primary mb-1">More info <i class="fa fa-arrow-circle-right"></i></a>
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
                <a href="<?php echo base_url('peminjaman/getMitra') ?>" class="text-xs font-weight-bold text-info mb-1">More info <i class="fa fa-arrow-circle-right"></i></a>
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
                <a href="<?php echo base_url('pengembalian/getMitra') ?>" class="text-xs font-weight-bold text-warning mb-1">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Loan Transaction</h5>
        <p class="card-text">Confirm loan transaction today</p>
        <a href="<?= base_url('peminjaman/getMitraAktivasi'); ?>" class="btn btn-primary">Show Data</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Return Transaction</h5>
        <p class="card-text">Confirm return transaction today</p>
        <a href="<?= base_url('pengembalian/getMitraAktivasi'); ?>" class="btn btn-primary">Show Data</a>
      </div>
    </div>
  </div>
</div>
</div>
</div>
      <!-- End of Main Content -->