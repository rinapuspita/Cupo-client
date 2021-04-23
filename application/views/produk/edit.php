<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Edit Product</h1>     
  <div class="row">
    <div class="col-lg-8">
      <?= form_open_multipart('produk/edit/'.$produk['id_produk']);?>
      <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">ID Produk</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="id_produk" name="id_produk" value="<?= $produk['id_produk']?>" readonly>
              <?= form_error('name','<small class="text-danger pl-3">','</small>'); ?> 
            </div>
          </div>
      <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Nama Produk</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Tambah nama produk" value="<?= $produk['nama_produk'] ?>">
            </div>
          </div>
            <div class="form-group row justify-content-end">
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
