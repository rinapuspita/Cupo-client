<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Edit Lending Data</h1>     
  <div class="row">
    <div class="col-lg-8">
      <?= form_open('peminjaman/editMitra/'.$pinjam['id_pinjam']);?>
      <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Borrow ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="id_pinjam" name="id_pinjam" value="<?= $pinjam['id_pinjam']?>" readonly>
            </div>
          </div>
      <div class="form-group row">
            <label for="tanggal_pinjam" class="col-sm-2 col-form-label">Loan Date</label>
            <div class="col-sm-10">
            <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="<?= $pinjam['tanggal_pinjam'] ?>">
            </div>
          </div>
      <div class="form-group row">
            <label for="tanggal_haruskembali" class="col-sm-2 col-form-label">Date Must Return</label>
            <div class="col-sm-10">
            <input type="date" class="form-control" id="tanggal_haruskembali" name="tanggal_haruskembali" value="<?= $pinjam['tanggal_haruskembali'] ?>">
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
