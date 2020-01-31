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
  <div class="kanban-board">

    <div class="row">
      <div class="col-md-12">
        <div class="main-card mb-3 card">
          <div class="card-header">Job Stages</div>
          <form method="post" >
            <div class="card-body">
              <div class="board">

              </div>

            </div>
            <div class="card-footer text-muted">
              <input type="submit" name="savekan" class="btn btn-info" value="Save Kanban">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>

<script src="<?= base_url('assets/js/lister/muuri.js') ?>" charset="utf-8"></script>
<script src="<?= base_url('assets/js/lister/demo2.js') ?>" charset="utf-8"></script>
