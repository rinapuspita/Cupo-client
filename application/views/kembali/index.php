<!-- Main Content -->
<div id="content">
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>          
      <div class="row">
        <div class="table-responsive">
        <?= form_error('kembali','<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?php if ($this->session->userdata('level') == '2') { ?>
        <a href="<?= base_url() . 'pengembalian/getMitraAktivasi' ?>" class="btn btn-primary mb-3">Activation Return Data</a>
        <?php } ?>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Borrower Name</th>
                <th scope="col">Product Name</th>
                <th scope="col">Return Location</th>
                <th scope="col">Return Date</th>
                <th scope="col">Late</th>  
                <th scope="col">Fine</th>     
                <th scope="col">Note</th>     
                <?php if ($this->session->userdata('level') == '2') { ?>
                  <th scope="col">Action</th> 
                <?php } ?>                                       
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
                <?php if ($this->session->userdata('level') == '2') { ?>
                <td>
                <a href="<?= base_url() . 'pengembalian/editMitra/' . $k['id_kembali'] ?>" class="btn btn-success btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-edit"></i>
                  </span>
                  <!-- <span class="text">Edit</span> -->
                </a>
                <a href="<?= base_url() . 'pengembalian/hapus/' . $k['id_kembali'] ?>" onclick="return confirm('Delete this data?')" class="btn btn-danger btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-trash"></i>
                  </span>
                  <!-- <span class="text">Hapus</span> -->
                </a>
                </td>                      
                <?php } ?>
              </tr>
              <?php $i++; ?>
              <?php endforeach; ?>
              <?php } else{?>
                <div class="alert alert-danger" role="alert">
                Empty Data.
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