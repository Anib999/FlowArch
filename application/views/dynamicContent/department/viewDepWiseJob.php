<div class="app-main__inner">
  <!--Title-->
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="fa fa-send icon-gradient bg-warm-flame">
          </i>
        </div>
        <div>View Jobs
          <div class="page-title-subheading">View and Update status.
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Title-->
  <?= $this->session->flashdata('error')!= null?'<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>':'' ?>
  <div class="row">
    <div class="col-md-12">
      <div class="main-card mb-3 card">
        <div class="card-header">View Job in Departments</div>
        <div class="card-body">

          <div class="col-md-4">
            <div class="card text-center">
              <div class="card-header">
                Jobs
              </div>
              <div class="card-body">
                <h5 class="card-title">
                  <?php
                  if($this->session->userdata('dep_type') == 1){
                    echo 'IT Department';
                  }elseif ($this->session->userdata('dep_type') == 2) {
                    echo 'HR Department';
                  }elseif($this->session->userdata('dep_type') == 3){
                    echo 'Legal Department';
                  }
                  ?>
                </h5>
                <a href="<?= base_url('Lister/drag?dep_type=').$this->session->userdata('dep_type') ?>" class="btn btn-success">View Jobs</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

</div>
