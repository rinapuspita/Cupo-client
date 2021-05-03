<!-- Main Content -->
<div id="content">
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>          
      <div class="row">
        <div class="table-responsive">
        <?= form_error('unreg','<div class="alert alert-danger" role="alert">', '</div>'); ?>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Fullname</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Action</th>                      
              </tr>
            </thead>
            <tbody>
            <?php $i=1; 
            $no =1;?>
            <?php if($this->session->userdata('user_id') && !empty($unreg)) { ?>
              <?php foreach ($unreg as $r) :  ?>
              <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $r['fullname']; ?></td>
                <td><?= $r['username']; ?></td>
                <td><?= $r['email']; ?></td>
                <td><?= $r['password']; ?></td>
                <td>
                <a href="<?= base_url() . 'admin/accCust/' . $r['id_cust'] ?>" class="btn btn-success btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                  </span>
                  <!-- <span class="text">Edit</span> -->
                </a>
                <a href="<?= base_url() . 'admin/hapusCust/' . $r['id_cust'] ?>" onclick="return confirm('Hapus data ini?')" class="btn btn-danger btn-icon-split">
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