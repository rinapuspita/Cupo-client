<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Edit Return Data</h1>     
  <div class="row">
    <div class="col-lg-8">
      <?= form_open('pengembalian/editMitra/'.$kembali['id_kembali']);?>
      <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Return ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="id_kembali" name="id_kembali" value="<?= $kembali['id_kembali']?>" readonly>
            </div>
          </div>
      <div class="form-group row">
            <label for="tanggal_kembali" class="col-sm-2 col-form-label">Return Date</label>
            <div class="col-sm-10">
            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="<?= $kembali['tanggal_kembali'] ?>">
            </div>
          </div>
      <div class="form-group row">
            <label for="status" class="col-sm-2 col-form-label">Note</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="status" name="status" value="<?= $kembali['status'] ?>">
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
