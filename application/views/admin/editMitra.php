<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Partner Data Update</h1>     
  <div class="row">
    <div class="col-lg-8">
      <?= form_open('admin/editMitra/'.$user['id']);?>
      <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">ID Partner</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="id" name="id" value="<?= $user['id']?>" readonly>
            </div>
          </div>
      <div class="form-group row">
            <label for="fullname" class="col-sm-2 col-form-label">Fullname</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname" value="<?= $user['fullname'] ?>">
            <?= form_error('fullname','<small class="text-danger pl-3">','</small>'); ?> 
            </div>
          </div>
      <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="username" name="username" placeholder="username" value="<?= $user['username'] ?>">
            <?= form_error('username','<small class="text-danger pl-3">','</small>'); ?> 
            </div>
        </div>
      <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= $user['email'] ?>">
            <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?> 
            </div>
      </div>
            <div class="form-group row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </div>                 
          </div>       
        </div>
      </form>        
    </div>
  </div>
</div>
<!-- /.container-fluid -->
