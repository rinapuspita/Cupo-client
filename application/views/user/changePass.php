<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Edit Password</h1>     
  <div class="row">
    <div class="col-lg-8">
      <?= form_open('admin/editMitra/'.$user['id']);?>
      <div class="form-group row">
            <!-- <label for="password" class="col-sm-2 col-form-label">Password</label> -->
            <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password Lama" required>
            <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?> 
            </div>
          </div>
          <div class="form-group row">
            <!-- <label for="password" class="col-sm-2 col-form-label">Password</label> -->
            <div class="col-sm-10">
            <input type="password" class="form-control" id="passwordBaru" name="passwordBaru" placeholder="Password Baru" required>
            <?= form_error('passwordBaru','<small class="text-danger pl-3">','</small>'); ?> 
            </div>
          </div>
          <div class="form-group row">
            <!-- <label for="password" class="col-sm-2 col-form-label">Password</label> -->
            <div class="col-sm-10">
            <input type="password" class="form-control" id="passwordConf" name="passwordConf" placeholder="Konfirmasi Password" required>
            <?= form_error('passwordConf','<small class="text-danger pl-3">','</small>'); ?> 
            </div>
          </div>
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Edit</button>
              </div>
            </div>                 
          </div>       
        </div>
      </form>        
    </div>
  </div>
</div>
<!-- /.container-fluid -->
<script type="text/javascript">
            window.onload = function () {
                document.getElementById("passwordBaru").onchange = validatePassword;
                document.getElementById("passwordConf").onchange = validatePassword;
            }
            function validatePassword(){
                var pass2=document.getElementById("passwordBaru").value;
                var pass1=document.getElementById("passwordConf").value;
                if(pass1!=pass2)
                    document.getElementById("passwordBaru").setCustomValidity("Password Tidak Sama, Coba Lagi");
                else
                    document.getElementById("passwordConf").setCustomValidity('');
            }
        </script>
