<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

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
  <?= $this->session->flashdata('success')!= null?'<div class="alert alert-success">'.$this->session->flashdata('success').'</div>':'' ?>
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
              <div class="col-md-6">
                <div class="position-relative form-group">
                  <label for="add_dep_type" class="">Department</label>
                  <select class="form-control" name="add_dep_type" id="add_dep_type">
                    <option value=" ">Select Department</option>
                    <?php
                    foreach ($depType as $k) {
                      printf("<option value='%d'>%s</option>",$k->id,$k->dep_type);
                    }
                    ?>
                  </select>
                </div>
                <?= form_error('add_dep_type') ?>
              </div>
            </div>
            <input type="submit" name="" class="btn btn-primary" value="Add Status">
          </form>

        </div>
      </div>
    </div>
  </div>

  <div class="form-row">
    <div class="col-md-12">
      <div class="main-card mt-3 card">
        <div class="card-body">
          <h5 class="card-title">Existing Job Status</h5>
          <table class="table" id="statusTable">
            <thead>
              <th>Id</th>
              <th>Status</th>
              <th>Department</th>
              <th>Options</th>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="<?= base_url('assets/js/department/statusDatatable.js') ?>" charset="utf-8"></script>
