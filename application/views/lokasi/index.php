<!-- Main Content -->
<div id="content">
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>          
      <div class="row">
        <div class="table-responsive">
        <?= form_error('lokasi','<div class="alert alert-danger" role="alert">', '</div>'); ?>
  
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Add Location Data</a>
      
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Partner</th>
                <th scope="col">Address</th>
                <th scope="col">Latitude</th>
                <th scope="col">Longitude</th>
                <th scope="col">Action</th>                      
              </tr>
            </thead>
            <tbody>
            <?php $i=1; 
            $no =1;?>
              <?php foreach ($lokasi as $l) :  ?>
              <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $l['fullname']; ?></td>
                <td><?= $l['alamat']; ?></td>
                <td><?= $l['latitude']; ?></td>
                <td><?= $l['longitude']; ?></td>
                <td>
                <a href="<?= base_url() . 'lokasi/edit/' . $l['id_lokasi'] ?>" class="btn btn-success btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-edit"></i>
                  </span>
                  <!-- <span class="text">Edit</span> -->
                </a>
                <a href="<?= base_url() . 'lokasi/hapus/' . $l['id_lokasi'] ?>" onclick="return confirm('Hapus data ini?')" class="btn btn-danger btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-trash"></i>
                  </span>
                  <!-- <span class="text">Hapus</span> -->
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
        <h5 class="modal-title" id="newRoleModalLabel">Add Location Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('lokasi/tambah'); ?>" method="post">
        <div class="modal-body">
        <div class="form-group">
        <!-- Collapsable Card Example -->
      <div class="card shadow mb-4">
      <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Get the coordinates of a place</h6></a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
        <div class="card-body">
        1. On your computer, open <a href="https://www.google.com/maps">Google Maps</a>. <br>
        2. Right-click the place or area on the map.<br>
        3. Select the latitude and longitude, this will automatically copy the coordinates.
        </div>
      </div>
      </div>
      
        <label for="id_mitra">Select Partner Location</label>
          <select class="form-control" name="id_mitra" id="id_mitra">
            <?php 
            foreach($mitra as $row){ 
              echo '<option value="'.$row['id'].'">'.$row['username'].'</option>';
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Partner Address" value="<?= set_value('alamat'); ?>">
          <?= form_error('alamat','<small class="text-danger pl-3">','</small>'); ?> 
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Latitude" value="<?= set_value('latitude'); ?>">
          <?= form_error('latitude','<small class="text-danger pl-3">','</small>'); ?> 
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Longitude" value="<?= set_value('longitude'); ?>">
          <?= form_error('longitude','<small class="text-danger pl-3">','</small>'); ?> 
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