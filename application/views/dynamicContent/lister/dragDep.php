<link rel="stylesheet" href="<?= base_url('assets/css/toastr.min.css') ?>">
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
        <div>Job Status of <?php echo $this->session->userdata('dep_name'); ?>
          <div class="page-title-subheading">View Job status.
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Title-->

  <div class="row">
    <div class="col-md-12">
      <div class="main-card mb-3 card">
        <!-- <div class="card-header">Job Stages</div> -->
        <div class="card-body overflow-auto" id="carder">
          <h5 class="card-title">Job Stages</h5>
          <div class="kanban-board" id="kan-b">
            <div class="boards">

            </div>
            <div class="board">

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

</div>
<script src="<?= base_url('assets/js/toastr.min.js') ?>" charset="utf-8"></script>
<script src="<?= base_url('assets/js/lister/muuri.js') ?>" charset="utf-8"></script>
<script src="<?= base_url('assets/js/lister/dragDep.js') ?>" charset="utf-8"></script>
<script src="<?= base_url('assets/js/lister/dragDepLog.js') ?>" charset="utf-8"></script>
