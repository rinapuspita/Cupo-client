<!-- Main Content -->
<div id="content">
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>          
      <div class="row">
        <div class="table-responsive">
        <?= form_error('kembali','<div class="alert alert-danger" role="alert">', '</div>'); ?>

          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Lokasi Kembali</th>
                <th scope="col">Tanggal Pengembalian</th>
                <th scope="col">Terlambat</th>  
                <th scope="col">Denda</th>     
                <th scope="col">Aksi</th>                      
              </tr>
            </thead>
            <tbody>
            <?php $i=1; 
            $no =1;?>
              <?php foreach ($kembali as $k) : 
                ?>
              <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $k['nama_peminjam']?></td>
                <td><?= $k['nama_produk']?></td>
                <td><?= $k['nama_mitra']?></td>
                <td><?= $k['tanggal_kembali']; ?></td>
                <td><?= $k['terlambat']; ?></td>
                <td><?= $k['denda']; ?></td>
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