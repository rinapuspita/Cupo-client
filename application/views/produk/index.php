<!-- Main Content -->
<div id="content">
  <!-- Begin Page Content -->
  <div class="container-fluid">
  <?php if (validation_errors()) : ?>
              <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
              </div>
              <?php endif; ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>          
      <div class="row">
        <div class="table-responsive">
        <?= form_error('produk','<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?php if($this->session->userdata('level') == '1'){ ?>
          <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Add New Product</a>
        <?php } ?>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Product Name</th>
                <th scope="col">QR Code</th>
                <th scope="col">Status</th>
                <th scope="col">ID Location</th>
                <?php if ($this->session->userdata('level') == '1') { ?>
                <th>Action</th>
                <?php } ?>
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
                <?php if($r['status'] == 1){?>
                  <?= 'Available'?>
                <?php } elseif($r['status'] == 2){?>
                  <?= 'Maintenance'?>
                <?php } else{?>
                  <?= 'Not Available'?>
                <?php }?>
                </td>
                <td><?= $r['id_mitra']; ?></td>
                <?php if ($this->session->userdata('level') == '1') { ?>
                <td>
                <a href="<?= base_url(). 'produk/qr_pdf/' . $r['id_produk'] ?>" target="_blank" class="btn btn-info btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-print"></i>
                  </span>
                  <!-- <span class="text">Detail</span> -->
                </a>
                <a href="<?= base_url() . 'produk/edit/' . $r['id_produk'] ?>" class="btn btn-success btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-edit"></i>
                  </span>
                  <!-- <span class="text">Edit</span> -->
                </a>
                <a href="<?= base_url() . 'produk/hapus/' . $r['id_produk'] ?>" onclick="return confirm('Delete this data?')" class="btn btn-danger btn-icon-split">
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

<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newRoleModalLabel">Add New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('produk/add'); ?>" method="post">
        <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?php echo set_value('nama_produk'); ?>" placeholder="Tambah nama produk">
        </div>
        <?= form_error('nama_produk','<small class="text-danger pl-3">','</small>'); ?> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editRoleModal" tabindex="-1" role="dialog" aria-labelledby="editRoleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editRoleModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php foreach ($produk as $r) : 
                ?>
      <form action="<?= base_url(). 'produk/edit/'?>" method="post">
        <div class="modal-body">
        <div class="form-group">
          <input type="hidden" class="form-control" id="id_produk" name="id_produk" value="<?= $r['id_produk']?>">
         <? var_dump($r['id_produk']); ?>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Tambah nama produk" value="<?= $r['nama_produk'] ?>">
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

      </form>
      <?php endforeach; ?>
    </div>
  </div>
</div>
