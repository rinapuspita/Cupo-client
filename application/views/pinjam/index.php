<!-- Main Content -->
<div id="content">
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>          
      <div class="row">
        <div class="table-responsive">
        <?= form_error('pinjam','<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?php if ($this->session->userdata('level') == '2') { ?>
        <a href="<?= base_url() . 'peminjaman/getMitraAktivasi' ?>" class="btn btn-primary mb-3">Loan Activation Data</a>
        <?php } ?>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Borrower Name</th>
                <th scope="col">Product Name</th>
                <th scope="col">Loan Location</th>
                <th scope="col">Loan Date</th>
                <th scope="col">Date Must Return</th>
                <th scope="col">Status</th>  
                <?php if ($this->session->userdata('level') == '2') { ?>
                  <th scope="col">Action</th> 
                <?php } ?>                     
              </tr>
            </thead>
            <tbody>
            <?php $i=1; 
            $no =1;?>
            <?php if($this->session->userdata('user_id') && !empty($pinjam)) { ?>
              <?php foreach ($pinjam as $p) : 
                ?>
              <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $p['nama_peminjam']?></td>
                <td><?= $p['nama_produk']?></td>
                <td><?= $p['fullname']?></td>
                <td><?= date('d F Y', strtotime($p['tanggal_pinjam']));?></td>
                <td><?= date('d F Y', strtotime($p['tanggal_haruskembali']));?></td>
                <td><?= $p['status']; ?></td>
                <?php if ($this->session->userdata('level') == '2') { ?>
                <td>
                <a href="<?= base_url() . 'peminjaman/editMitra/' . $p['id_pinjam'] ?>" class="btn btn-success btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-edit"></i>
                  </span>
                  <!-- <span class="text">Edit</span> -->
                </a>
                <a href="<?= base_url() . 'peminjaman/hapusMitra/' . $p['id_pinjam'] ?>" onclick="return confirm('Delete this data?')" class="btn btn-danger btn-icon-split">
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
<!--
<script>
$(document).ready(function() {
    $('#dataTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
} );
</script> -->