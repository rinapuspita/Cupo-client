<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Edit Data </h1>     
  <div class="row">
    <div class="col-lg-8">
      <?= form_open('lokasi/edit/'.$lokasi['id_lokasi']);?>
      <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">ID Lokasi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="id_lokasi" name="id_lokasi" value="<?= $lokasi['id_lokasi']?>" readonly>
            </div>
          </div>
          <div class="form-group row">
        <label for="id_mitra" class="col-sm-2 col-form-label">Lokasi Mitra</label>
        <div class="col-sm-10">
          <select class="form-control" name="id_mitra" id="id_mitra" disabled>
          <?php foreach ($mitra as $row) : ?>
                <?php if ($row['id'] == $lokasi['id_mitra']) : ?>
                    <option value="<?= $row['id'] ?>" selected><?= $row['username'] ?></option>
                <?php else : ?>
                    <option value="<?= $row['id'] ?>"><?= $row['username'] ?></option>
                <?php endif ?>
            <?php endforeach ?>
          </select>
        </div>
          </div>
        <div class="form-group row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
            <textarea class="form-control" id="alamat" name="alamat" placeholder="alamat">
            </textarea>
            <?= form_error('alamat','<small class="text-danger pl-3">','</small>'); ?> 
            </div>
        </div>
      <div class="form-group row">
            <label for="latitude" class="col-sm-2 col-form-label">Latitude</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="latitude" name="latitude" placeholder="latitude" value="<?= $lokasi['latitude'] ?>">
            <?= form_error('latitude','<small class="text-danger pl-3">','</small>'); ?> 
            </div>
        </div>
      <div class="form-group row">
            <label for="longitude" class="col-sm-2 col-form-label">Longitude</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="longitude" name="longitude" placeholder="longitude" value="<?= $lokasi['longitude'] ?>">
            <?= form_error('longitude','<small class="text-danger pl-3">','</small>'); ?> 
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
