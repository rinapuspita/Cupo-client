<!-- Main Content -->
<div id="content">
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>          
      <div class="row">
        <div class="table-responsive">
        <?= form_error('produk','<div class="alert alert-danger" role="alert">', '</div>'); ?>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Product Name</th>
                <th scope="col">QR Code</th>
                <th scope="col">Status</th>
                <th scope="col">ID Location</th>
                <th scope="col">Action</th>                      
              </tr>
            </thead>
            <tbody>
            <?php $i=1; 
            $no =1;?>
            <?php if($this->session->userdata('user_id') && !empty($produk)) { ?>
              <?php foreach ($produk as $r) : 
                ?>
              <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $r['nama_produk']; ?></td>
                <td><img src="<?= 'https://server-cupo.xyz/assets/images/'. $r['qr_code']; ?>" style="width: 100px; height:100px;"></td>
                <td>
                <?= $r['status'];?>
                </td>
                <td><?= $r['id_mitra']; ?></td>
                <td>
                <a href="<?= base_url() . 'produk/distribusi/' .$r['id_produk']?>" class="btn btn-info btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-info-circle"></i>
                  </span>
                  <span class="text">Cup Distribution</span>
                </a>
                </td>                      
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