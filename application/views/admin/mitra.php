<!-- Main Content -->
<div id="content">
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>          
      <div class="row">
        <div class="table-responsive">
        <?= form_error('user','<div class="alert alert-danger" role="alert">', '</div>'); ?>
  
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Tambah Mitra Baru</a>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Fullname</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Level</th>
                <th scope="col">Action</th>                      
              </tr>
            </thead>
            <tbody>
            <?php $i=1; 
            $no =1;?>
              <?php foreach ($user as $r) :  ?>
              <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $r['fullname']; ?></td>
                <td><?= $r['username']; ?></td>
                <td><?= $r['email']; ?></td>
                <td><?= $r['password']; ?></td>
                <td><?= $r['level']; ?></td>
                <td>
                <a href="<?= base_url('admin/get') . $r['id'] ?>" class="btn btn-info btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-info-circle"></i>
                  </span>
                </a>
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

<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newRoleModalLabel">Add New Mitra</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/addMitra'); ?>" method="post">
        <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname" value="<?= set_value('fullname'); ?>">
          <?= form_error('fullname','<small class="text-danger pl-3">','</small>'); ?> 
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
          <?= form_error('username','<small class="text-danger pl-3">','</small>'); ?> 
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
          <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?> 
        </div>
        <div class="form-group">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?= set_value('password'); ?>">
          <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?> 
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