<div class="app-main__inner">
  <!--Title-->
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="fa fa-send icon-gradient bg-warm-flame">
          </i>
        </div>
        <div>Add Job Status
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
        <div class="card-header">Add Job Status</div>
        <div class="card-body">

          <form action="<?= base_url('Department/insertKanTitle') ?>" method="post">
          <div class="form-row">
            <div class="col-md-6">
              <div class="position-relative form-group">
                <label for="add_status" class="">Status</label>
                <input name="add_status" id="add_status" placeholder="Status" type="text" class="form-control" required>
              </div>
              <?= form_error('add_status') ?>
            </div>
          </div>
          <input type="submit" name="" class="btn btn-primary" value="Add Status">
        </form>

        </div>
      </div>
    </div>
  </div>

</div>
