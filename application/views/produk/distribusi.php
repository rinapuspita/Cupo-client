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
                <th scope="col">Nama Produk</th>
                <th scope="col">QR Code</th>
                <th scope="col">Status</th>
                <th scope="col">ID Lokasi</th>
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
                <a href="" data-toggle="modal" data-target="#newRoleModal" class="btn btn-info btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-info-circle"></i>
                  </span>
                  <span class="text">Distrubsi Cup</span>
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

<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newRoleModalLabel">Distribusi Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url() . 'produk/distribusi'?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
        <div class="form-group">
          <input type="hidden" class="form-control" id="id_produk" name="id_produk" value="<?= $r['id_produk']?>">
         <? var_dump($r['id_produk']); ?>
        </div>
        <div class="form-group">
        <label for="id_mitra">Pilih Lokasi Mitra</label>
          <select class="form-control" name="id_mitra" id="id_mitra">
            <?php 
            foreach($mitra as $row){ 
              echo '<option value="'.$row['id'].'">'.$row['username'].'</option>';
            }
            ?>
          </select>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

      </form>
    </div>
  </div>
</div>