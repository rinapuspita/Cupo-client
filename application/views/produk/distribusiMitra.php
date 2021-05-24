<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Product Distribution</h1>     
  <div class="row">
    <div class="col-lg-8">
      <?= form_open_multipart('produk/distribusi/'.$produk['id_produk']);?>
      <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Product ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="id_produk" name="id_produk" value="<?= $produk['id_produk']?>" readonly>
              <?= form_error('name','<small class="text-danger pl-3">','</small>'); ?> 
            </div>
          </div>
      <div class="form-group row">
            <label for="id_mitra" class="col-sm-2 col-form-label">Choose Partner Location</label>
            <div class="col-sm-10">
            <select class="form-control" name="id_mitra" id="id_mitra">
            <?php 
            foreach($mitra as $row){ 
              echo '<option value="'.$row['id'].'">'.$row['username'].'</option>';
            }
            ?>
          </select>
            </div>
          </div>
            <div class="form-group row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Cup Distribution</button>
              </div>
            </div>                 
          </div>       
        </div>
      </form>        
    </div>
  </div>
</div>
<!-- /.container-fluid -->
