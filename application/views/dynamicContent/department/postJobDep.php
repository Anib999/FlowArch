<div class="app-main__inner">
  <!--Title-->
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="fa fa-send icon-gradient bg-warm-flame">
          </i>
        </div>
        <div>Add Job in Department
          <div class="page-title-subheading">Add Job.
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Title-->
  <div class="row">
    <div class="col-md-12">
      <div class="main-card mb-3 card">
        <div class="card-header">Add Job</div>
        <div class="card-body">

          <form action="<?= base_url('Lister/insertKanbanDataForm') ?>" method="post">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3">
                      <label for="modal_job_title" class="mt-2 pull-right">Job Title</label>
                    </div>
                    <div class="col-md-9">
                      <input name="modal_job_title" placeholder="Job Title" type="text" class="form-control" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3">
                      <label for="modal_job_description" class="mt-2 pull-right">Job Description</label>
                    </div>
                    <div class="col-md-9">
                      <textarea name="modal_job_description" class="form-control"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="position-relative form-group">
                  <label for="job_priority" class="">Priority</label>
                  <select class="form-control" name="job_priority">
                    <option value=" ">None</option>
                    <option value="High">High</option>
                    <option value="Medium">Medium</option>
                    <option value="Low">Low</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="position-relative form-group">
                  <label for="job_stage" class="">Job Stage</label>
                  <input type="text" name="job_stage" class="form-control" value="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="position-relative form-group">
                  <label for="service_type" class="">Service Type</label>
                  <input type="text" name="service_type" id="service_type" class="form-control" value="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="position-relative form-group">
                  <label for="date_of_completion" class="">Expected Date of Completion</label>
                  <input type="date" name="date_of_completion" id="date_of_completion" class="form-control" value="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="position-relative form-group">
                  <label for="dep_type">Department</label>
                  <select class="form-control" name="dep_type" required>
                    <option value="">Select Department</option>
                    <?php
                    foreach ($depType as $k) {
                      printf("<option value='%d'>%s</option>",$k->id,$k->dep_type);
                    }
                    ?>
                  </select>
                  <?= form_error('dep_type'); ?>
                </div>
              </div>
              <input type="hidden" name="status" value="" style="display:none;">
            </div>
            <input type="submit" name="" class="btn btn-primary pull-right" value="Post Job">
          </form>

        </div>
      </div>
    </div>
  </div>

</div>
<script src="<?= base_url('assets/js/department/searchDepartment.js') ?>" charset="utf-8"></script>
