<!-- Main Content -->
<div id="content">
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>          
      <div class="row">
        <div class="table-responsive">
        <?= form_error('pinjam','<div class="alert alert-danger" role="alert">', '</div>'); ?>

          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Harus Kembali</th>
                <th scope="col">Status</th>  
                <th scope="col">Aksi</th>                      
              </tr>
            </thead>
            <tbody>
            <?php $i=1; 
            $no =1;?>
              <?php foreach ($pinjam as $p) : 
                ?>
              <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $p['nama_peminjam']?></td>
                <td><?= $p['nama_produk']?></td>
                <td><?= $p['tanggal_pinjam']; ?></td>
                <td><?= $p['tanggal_haruskembali']; ?></td>
                <td><?= $p['status']; ?></td>
                <td>
                <a href="" class="btn btn-success btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                  </span>
                </a>
                <a href="" class="btn btn-danger btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-trash"></i>
                  </span>
                </a>
                </td>                      
              </tr>
              <?php $i++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->