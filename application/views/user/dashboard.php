
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
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Transaksi Peminjaman</h5>
        <p class="card-text">Konfirmasi transaksi peminjaman hari ini</p>
        <a href="<?= base_url('peminjaman/getMitraAktivasi'); ?>" class="btn btn-primary">Lihat Data</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Transaksi Pengembalian</h5>
        <p class="card-text">Konfirmasi transaksi pengembalian hari ini</p>
        <a href="<?= base_url('pengembalian/getMitraAktivasi'); ?>" class="btn btn-primary">Lihat Data</a>
      </div>
    </div>
  </div>
</div>
</div>
</div>
      <!-- End of Main Content -->