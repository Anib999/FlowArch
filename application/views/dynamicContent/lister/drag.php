<link rel="stylesheet" href="<?= base_url('assets/css/lister/drag.css') ?>">
<div class="app-main__inner">
  <!--Title-->
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="fa fa-send icon-gradient bg-warm-flame">
          </i>
        </div>
        <div>Job Status
          <div class="page-title-subheading">View and Update status.
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Title-->
  
  <div class="row">
    <div class="col-md-12">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addJobModal" name="button">Add a job</button>
    </div>
  </div>
  <br />
  <!-- <button type="button" id="addCol" name="button">Add</button> -->
  <div class="row">
    <div class="col-md-12">
      <div class="main-card mb-3 card">
        <div class="card-header">Job Stages</div>
        <div class="card-body">

          <div class="kanban-board">
            <div class="board">

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

</div>

<script src="<?= base_url('assets/js/lister/muuri.js') ?>" charset="utf-8"></script>
<script src="<?= base_url('assets/js/lister/dragger.js') ?>" charset="utf-8"></script>
