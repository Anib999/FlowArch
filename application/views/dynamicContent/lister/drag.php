<link rel="stylesheet" href="<?= base_url('assets/css/lister/drag.css') ?>">
<div class="app-main__inner">
  <!--Title-->
  <!-- <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="fa fa-send icon-gradient bg-warm-flame">
          </i>
        </div>
        <div>Job Status of <?php echo $this->session->userdata('dep_name'); ?>
          <div class="page-title-subheading">View and Update status.
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <!--Title-->

  <div class="row">
    <div class="col-md-12">
      <div class="job_header">
        <h5>Job Status of <?php echo $this->session->userdata('dep_name'); ?></h5>
      </div>
      <button type="button" class="btn btn-primary" id="add_job" name="button">Add a job</button>
      <a href="<?= base_url('Lister/dragToFlow?dep_type='.$_GET['dep_type'].'') ?>"><button type="button" name="button" class="pull-right btn btn-info">View in FlowChart</button></a>
      <a href="<?= base_url('Lister/dragTable') ?>"><button type="button" class="btn btn-secondary pull-right" name="view_table" style="margin-right:5px;">View in Table</button></a>
    </div>
  </div>
  <br />
  <!-- <button type="button" id="addCol" name="button">Add</button> -->
  <div class="row">
    <div class="col-md-12">
      <!-- <div class="main-card mb-3 card">
        <div class="card-header">Job Stages</div>
        <div class="card-body" id="carder"> -->
          <img id="loader" src="<?= base_url('assets/images/newla.gif') ?>" alt="" style="position: absolute; z-index:3;left:39%">

          <div class="kanban-board" id="kan-b">
            <div class="boards">

            </div>
            <div class="board">

            </div>
          </div>

        <!-- </div>
      </div> -->
    </div>
  </div>

</div>

<script src="<?= base_url('assets/js/lister/muuri.js') ?>" charset="utf-8"></script>
<script src="<?= base_url('assets/js/lister/dragger.js') ?>" charset="utf-8"></script>
<script src="<?= base_url('assets/js/lister/dragLog.js') ?>" charset="utf-8"></script>
