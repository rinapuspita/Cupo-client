
      <!-- Main Content -->
      <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">My Profile</h1>

          <div class="div col">
            <div class="div col-lg-6">
              <!-- <?= $this->session->flashdata('message'); ?> -->
            </div>
          </div>

          <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/default.jpg')?>" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?=  $this->session->userdata('name')?></h5>
                  <p class="card-text"><?=  $this->session->userdata('email')?></p>
                  <p class="card-text"><small class="text-muted">Member since <?= date('d F Y',  $this->session->userdata('created_at'));?></small></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->