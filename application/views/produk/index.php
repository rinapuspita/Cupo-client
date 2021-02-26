<!-- Main Content -->
<div id="content">
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>          
      <div class="row">
        <div class="table-responsive">
        <?= form_error('produk','<div class="alert alert-danger" role="alert">', '</div>'); ?>
  
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Tambah Produk Baru</a>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">QR Code</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>                      
              </tr>
            </thead>
            <tbody>
            <?php $i=1; 
            $no =1;?>
              <?php foreach ($produk as $r) : 
                $path = 'downloads/produk/';
                $img = 'qr_code' . $i++ . '.png';
                file_put_contents($path . $img, base64_decode($r['qr_code']))
                ?>
              <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $r['nama_produk']; ?></td>
                <!-- <td><img src="<?= $path . $img ?>" style="width: 100px; height:100px;"></td> -->
                <td><img src="<?= $path.$img?>" style="width: 100px; height:100px;"></td>
                <td><?= $r['status']; ?></td>
                <td>
                <a href="<?= base_url('produk/get') . $r['id_produk'] ?>" class="btn btn-info btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-info-circle"></i>
                  </span>
                  <span class="text">Detail</span>
                </a>
                <a href="" class="btn btn-success btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                  </span>
                  <span class="text">Edit</span>
                </a>
                <a href="" class="btn btn-danger btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-trash"></i>
                  </span>
                  <span class="text">Hapus</span>
                </a>
                  <!-- <a href="<?= base_url('produk/get') . $r['id_produk'] ?>" class="badge badge-warning">Detail</a>
                  <a href="" class="badge badge-success">Edit</a>
                  <a href="" class="badge badge-danger">Hapus</a> -->
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
          <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Tambah nama produk">
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