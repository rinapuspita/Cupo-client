<!-- Main Content -->
<div id="content">
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>          
      <div class="row">
        <div class="table-responsive">
        <?= form_error('kembali','<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <a href="<?= base_url() . 'pengembalian/getMitraAktivasi' ?>" class="btn btn-primary mb-3">Aktivasi Data Pengembalian</a>
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
                <th scope="col">Catatan</th>     
                <th scope="col">Aksi</th>                      
              </tr>
            </thead>
            <tbody>
            <?php $i=1; 
            $no =1;?>
            <?php if($this->session->userdata('user_id') && !empty($kembali)) { ?>
              <?php foreach ($kembali as $k) : 
                ?>
              <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $k['nama_peminjam']?></td>
                <td><?= $k['nama_produk']?></td>
                <td><?= $k['nama_mitra']?></td>
                <td><?= date('d F Y', strtotime($k['tanggal_kembali']));?></td>
                <td><?= $k['terlambat']; ?></td>
                <td><?= $k['denda']; ?></td>
                <td><?= $k['status']; ?></td>
                <td>
                <a href="<?= base_url() . 'pengembalian/editMitra/' . $k['id_kembali'] ?>" class="btn btn-success btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-edit"></i>
                  </span>
                  <!-- <span class="text">Edit</span> -->
                </a>
                <a href="<?= base_url() . 'pengembalian/hapus/' . $k['id_kembali'] ?>" onclick="return confirm('Hapus data ini?')" class="btn btn-danger btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-trash"></i>
                  </span>
                  <!-- <span class="text">Hapus</span> -->
                </a>
                </td>                      
              </tr>
              <?php $i++; ?>
              <?php endforeach; ?>
              <?php } else{?>
                <div class="alert alert-danger" role="alert">
                data tidak ditemukan.
                </div>
                <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->